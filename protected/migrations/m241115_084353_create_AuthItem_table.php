<?php

class m241115_084353_create_AuthItem_table extends CDbMigration
{
    public function up()
    {
        $this->execute("CREATE TABLE `AuthItem` (
          `name` varchar(64) NOT NULL,
          `type` int(11) NOT NULL,
          `description` text DEFAULT NULL,
          `bizrule` text DEFAULT NULL,
          `data` text DEFAULT NULL,
          PRIMARY KEY (`name`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    }

    public function down()
    {
        $this->execute("DROP TABLE `AuthItem`;");
    }

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}