<?php

class m241115_112216_create_user_test extends CDbMigration
{
	public function up()
	{
        $model = new Users();

        $model->login = 'admin';
        $model->name = 'admin';
        $model->email = 'admin@mail.ru';
        $model->prev_role = Users::ROLE_ADMIN;
        $model->password = md5('admin');
        $model->confirm_password = md5('admin');
        $model->state = '1';
        $model->save();

    }

	public function down()
	{
		echo "m241115_112216_create_user_test does not support migration down.\n";
		return false;
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