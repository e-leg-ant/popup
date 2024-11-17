<?php

class m241115_113332_create_popup_table extends CDbMigration
{
	public function up()
	{
	    $this->createTable('popup', array(
            'id' => 'pk',
            'active' => 'enum("0", "1") default "1"',
            'name' => 'varchar(200)',
            'content' => 'text',
            'seen' => 'int(11)',
        ), 'DEFAULT CHARSET=utf8');
	}

	public function down()
	{
        $this->dropTable('popup');
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