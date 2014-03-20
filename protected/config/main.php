<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Aseos Cabina',
        'defaultController'=>'site/index',
        
        'behaviors'=>array(
             'class'=>'application.components.ApplicationBehavior',
        ),
	// preloading 'log' component
	'preload'=>array('log'),
        // application theme
        'theme'=>'shadow_dancer',

        
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.controllers.*',
        'ext.EDataTables.*',
        'application.extensions.TabularInputManager',
        
	),
       
            'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345678',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

        'language'=>'es',

   
	// application components
	'components'=>array(
		'mailto'=>array(
				'class' =>'application.extensions.mailto.Mailto'
		),
               
          // 'mail' => array(
            // 'class' => 'ext.yii-mail.YiiMail',
             // 'transportType'=>'smtp',
             // 'transportOptions'=>array(
               // 'host'=>'smtp.gmail.com',
               // 'username'=>'reportes.mejora.continua@gmail.com',
               // 'password'=>'12345678mc',
               // 'port'=>'465',
               // 'encryption'=>'tls',
             // ),
			'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
             'transportType'=>'smtp',
             'transportOptions'=>array(
               'host'=>'mail.lan.com',
               'username'=>'diego.paredes',
               'password'=>'12341234',
               'port'=>'465',
               'encryption'=>'tls',
             ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false
        ),
                'coreMessages'=>array(
                    'basePath'=>null,
                ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=bd_aseo',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'eleterno77',
			'charset' => 'utf8',
                        'enableParamLogging'=>true,
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
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'reportes.mejora.continua@gmail.com',
	),
);
