<?php

$site_config = [];

switch ($_SERVER['HTTP_HOST']) {

    case 'local.test.ru': {
        $site_config['domain'] = 'local.test.ru';
        $site_config['root'] = 'test/web';
        $site_config['db'] = 'db_test';
    }

    break;

}

$db_components = [
    'db_test' => [
        'class' => 'CDbConnection',
        'connectionString' => 'mysql:host=localhost;dbname=test',
        'emulatePrepare' => true,
        'username' => 'test',
        'password' => 'test',
        'charset' => 'utf8',
        'enableParamLogging' => true,
        'enableProfiling' => YII_DEBUG,
    ]

];

return [
	'basePath' => __DIR__ . '/../',
	'name' => 'Test' . ' - ' . $site_config['domain'],
    'sourceLanguage' => 'ru',
    'charset' => 'UTF-8',

	// preloading 'log' component
	'preload' => ['log'],

	// autoloading model and component classes
	'import' => [
		'application.models.*',
		'application.components.*',
	],

	'modules' => [
		// uncomment the following to enable the Gii tool

		'gii' => [
			'class'=>'system.gii.GiiModule',
			'password' => '1234',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => ['127.0.0.1','::1', '192.168.56.107'],
		],

	],

	// application components
	'components' => [

		// uncomment the following to enable URLs in path-format
		'urlManager' => [
			'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'urlSuffix' => '',
			'rules' => [
                'popup/widget'=>array('popup/widget', 'urlSuffix'=>'.js', 'caseSensitive'=>false),
            ],
		],

        $db_components,

        'db' => $db_components[$site_config['db']],

        'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
            'loginUrl' => array('site/login'),
		),

		'authManager' => [
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
        ],
		'errorHandler' => [
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ],

		'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'levels'=>'info, error, warning, application',
                    'categories' => 'system.db.CDbCommand',
                    'maxLogFiles' => 14,
                ],
                [
                    'class' => 'CProfileLogRoute',
                    'report' => 'summary',  /* summary or callstack */
                ],
                /*array(
                    'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters'=>array('127.0.0.1','192.168.56.107'),
                ),*/
            ],
        ],

        'session' => [
            'autoStart' => true,
            'timeout' => 86400,
        ],

        'cache' => [
            'class' => 'system.caching.CFileCache',
        ],

	],

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
        'domain' => $site_config['domain'],
        'root' => $site_config['root']
        ),
];