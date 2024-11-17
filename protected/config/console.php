<?php

return  array(

	'basePath' => __DIR__ . '/../',
	'name' => 'Test',
    'sourceLanguage' => 'en',
    'charset' => 'UTF-8',

	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
	),

    // application components
	'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=test',
            'username' => 'test',
            'password' => 'test',
            'charset' => 'utf8',
        ),
        'cache' => array(
            'class' => 'system.caching.CFileCache',
        ),
        'session' => array(
            'autoStart' => true,
            'timeout' => 86400,
        ),

        'authManager' => [
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
        ],
    ),

    'commandMap' => array(
        'migrate' => array(
            'class' => 'system.cli.commands.MigrateCommand',
            'migrationPath' => 'application.migrations',
            'migrationTable' => 'migrations',
            'connectionID' => 'db',
            //'templateFile' => 'application.migrations.template',
        ),
    ),
);



