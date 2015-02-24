<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $sum
 * @property string $card_no
 * @property integer $exp_month
 * @property integer $exp_year
 * @property integer $cvv
 * @property string $city
 * @property string $state
 * @property string $address
 * @property string $zip_code
 */
class Orders extends \yii\db\ActiveRecord
{
    
    public $hash;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sum', 'exp_month', 'exp_year', 'cvv', 'name', 'last_name', 'email', 'city', 'phone', 'card_no', 'state', 'address', 'zip_code'], 'required'],
            [['sum'], 'number'],
//            [['sum'], 'number', 'min' => 0.01],
            [['exp_month', 'exp_year', 'cvv'], 'integer'],
            [['name', 'last_name', 'email', 'city'], 'string', 'max' => 64],
            [['email'], 'email'],
            [['card_no'], 'string', 'max' => 16],
            [['phone'], 'string', 'min' => 16, 'max' => 16],
            [['state'], 'string', 'min' => 2, 'max' => 2],
            [['address'], 'string', 'max' => 255],
            [['zip_code'], 'string', 'max' => 5],
            ['hash', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'sum' => 'Sum',
            'card_no' => 'Card No',
            'exp_month' => 'Exp Month',
            'exp_year' => 'Exp Year',
            'cvv' => 'Cvv',
            'city' => 'City',
            'state' => 'State',
            'address' => 'Address',
            'zip_code' => 'Zip Code',
        ];
    }
    
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        $this->hash = sha1($this->name
                .$this->last_name
                .$this->phone
                .$this->email
                .$this->sum
                .$this->card_no
                .$this->exp_month
                .$this->exp_year
                .$this->cvv
                .$this->city
                .$this->state
                .$this->address
                .$this->zip_code);
        $curl = new \linslin\yii2\curl\Curl();
        $curl->setOption(CURLOPT_POSTFIELDS, http_build_query($this->attributes));
        $curl->setOption(CURLOPT_RETURNTRANSFER, 1);
        $response = $curl->post(Yii::$app->params['api_url'], FALSE);
        if(isset($response['errors'])){
            foreach ($response['errors'] as $key => $err){
                $this->addError($key, 'API: ' . $err[0]);
            }
            return false;
        }
        return TRUE;
    }
    
    
    public function attributes() {
        return array_merge(parent::attributes(), ['hash']);
    }
    
}
