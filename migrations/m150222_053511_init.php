<?php

use yii\db\Schema;
use yii\db\Migration;

class m150222_053511_init extends Migration
{
    public function up()
    {
        $this->createTable('{{%orders}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(64)',
            'last_name' => Schema::TYPE_STRING . '(64)',
            'phone' => Schema::TYPE_STRING . '(16)',
            'email' => Schema::TYPE_STRING . '(64)',
            'sum' => Schema::TYPE_MONEY,
            'card_no' => Schema::TYPE_STRING . '(16)',
            'exp_month' => Schema::TYPE_INTEGER,
            'exp_year' => Schema::TYPE_INTEGER,
            'cvv' => Schema::TYPE_INTEGER,
            'city' => Schema::TYPE_STRING . '(64)',
            'state' => Schema::TYPE_STRING . '(2)',
            'address' => Schema::TYPE_STRING . '(255)',
            'zip_code' => Schema::TYPE_STRING . '(5)',
        ]);
    }

    public function down()
    {
        echo "m150222_053511_init cannot be reverted.\n";

        return false;
    }
}
