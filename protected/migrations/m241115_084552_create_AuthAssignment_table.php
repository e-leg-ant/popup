<?php

class m241115_084552_create_AuthAssignment_table extends CDbMigration
{
    public function up()
    {
        $this->execute("CREATE TABLE `AuthAssignment` (
              `itemname` varchar(64) NOT NULL,
              `userid` varchar(64) NOT NULL,
              `bizrule` text DEFAULT NULL,
              `data` text DEFAULT NULL,
              PRIMARY KEY (`itemname`,`userid`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down()
    {
        $this->execute("DROP TABLE `AuthAssignment`;");
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