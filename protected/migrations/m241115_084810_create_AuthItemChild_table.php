<?php

class m241115_084810_create_AuthItemChild_table extends CDbMigration
{
    public function up()
    {
        $this->execute("CREATE TABLE `AuthItemChild` (
          `parent` varchar(64) NOT NULL,
          `child` varchar(64) NOT NULL,
          PRIMARY KEY (`parent`,`child`),
          KEY `child` (`child`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down()
    {
        $this->execute("DROP TABLE `AuthItemChild`;");
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