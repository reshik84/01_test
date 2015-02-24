<?php

use yii\db\Schema;
use yii\db\Migration;

class m150224_143318_status extends Migration
{
    public function up()
    {
        $this->addColumn('{{%orders}}', 'status', Schema::TYPE_INTEGER);
    }

    public function down()
    {
        echo "m150224_143318_status cannot be reverted.\n";

        return false;
    }
}
