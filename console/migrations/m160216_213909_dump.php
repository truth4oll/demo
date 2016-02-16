<?php

use yii\db\Migration;

class m160216_213909_dump extends Migration
{
    public function up()
    {
        $this->execute(file_get_contents(__DIR__ . '/dump.sql'));
    }

    public function down()
    {
        echo "m160216_213909_dump cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
