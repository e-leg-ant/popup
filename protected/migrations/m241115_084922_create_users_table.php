<?php

class m241115_084922_create_users_table extends CDbMigration
{
    public function up()
    {
        $this->execute("CREATE TABLE `users` (
          `id` smallint(6) NOT NULL AUTO_INCREMENT,
          `login` varchar(50) NOT NULL,
          `name` varchar(100) DEFAULT NULL,
          `email` varchar(50) DEFAULT NULL,
          `phone` varchar(17) DEFAULT NULL,
          `password` varchar(50) DEFAULT NULL,
          `state` enum('enabled','disabled') NOT NULL,
          `role` enum('admin','guest') NOT NULL DEFAULT 'guest',
          `last_login` datetime DEFAULT NULL,
          `last_active` datetime DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

        ");
    }

    public function down()
    {
        $this->execute("DROP TABLE `users`;");
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