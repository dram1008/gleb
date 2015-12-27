<?php

use yii\db\Schema;
use yii\db\Migration;

class m151227_114335_files extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE galaxysss_5.rod_files ADD title varchar(255) NULL;');
    }

    public function down()
    {
        echo "m151227_114335_files cannot be reverted.\n";

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
