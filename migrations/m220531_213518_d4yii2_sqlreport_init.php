<?php

use yii\db\Migration;

class m220531_213518_d4yii2_sqlreport_init  extends Migration {

    public function safeUp() { 
        $this->execute('
            CREATE TABLE `sqlreport` (
              `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
              `sys_company_id` smallint(5) unsigned DEFAULT NULL,
              `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
              `sql` text CHARACTER SET utf8,
              `notes` text CHARACTER SET utf8,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1        
        ');
    }

    public function safeDown() {
        echo "m220531_213518_d4yii2_sqlreport_init cannot be reverted.\n";
        return false;
    }
}
