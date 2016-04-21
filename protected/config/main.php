<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'CIGARRITA',
	'language'=>'es',
	'sourceLanguage'=>'00',
	'charset'=>'utf-8',
	'theme'=>'design',
	// preloading 'log' component
	// 'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		//'application.controllers.*',
	),
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'150189',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),
	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=cigarritaworker_v2',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '150189',
			'charset' => 'utf8',
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'urlManager'=>array(
		    'urlFormat'=>'path',
		    'showScriptName'=>false,
		    'rules'=>array(
		    	// REST patterns
		        array('api/list', 'pattern'=>'api/<model:\w+>/query/<filter:({.*?})>', 'verb'=>'GET'),
		        array('api/view', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'GET'),
		        array('api/update', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
		        array('api/delete', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
		        array('api/safeDelete', 'pattern'=>'api/<model:\w+>/safe/<id:\d+>', 'verb'=>'DELETE'),
		        array('api/realTimeUpdate', 'pattern'=>'api/realTimeUpdate', 'verb'=>'POST'),
		        array('api/formContact', 'pattern'=>'api/formContact', 'verb'=>'POST'),
		        array('api/upload', 'pattern'=>'api/upload', 'verb'=>'POST'),
		        array('api/menuSort', 'pattern'=>'api/menuSort', 'verb'=>'POST'),
		        array('api/postSort', 'pattern'=>'api/postSort', 'verb'=>'POST'),
		        array('api/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'),		        
		        // Other controllers
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

			),
		),			
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
		'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
		),
	),
	'params'=>array(
		'adminEmail'=>'carlos@cigarrita-worker.com',
	),
);