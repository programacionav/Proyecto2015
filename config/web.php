<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
    	'admpacientes' => [
    		'class' => 'app\modules\admpacientes\admPacientesModule',
    	],    
    	'adminternaciones' => [
    		'class' => 'app\modules\adminternaciones\admInternacionesModule',
    	],    
    	'admturnos' => [
    		'class' => 'app\modules\admturnos\admTurnosModule',
    	],    
    	'admpersonal' => [
    		'class' => 'app\modules\admpersonal\admPersonalModule',
    	],    
    	'admcomedor' => [
    		'class' => 'app\modules\admcomedor\admComedorModule',
    	],    
    	'admfarmacia' => [
    		'class' => 'app\modules\admfarmacia\admFarmaciaModule',
    	],    
    	'admwiki' => [
    		'class' => 'app\modules\admwiki\admWikiModule',
    	],
    	'admobrasociales' => [
    		'class' => 'app\modules\admobrasociales\admObraSocialesModule',
    	],
    	'admambulancias' => [
    		'class' => 'app\modules\admambulancias\admAmbulanciasModule',
    	],    
    	'admcapacitaciones' => [
    		'class' => 'app\modules\admcapacitaciones\admcapacitacionesModule',
    	],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Programacion avanzada 2015',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Usuarios',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
         'urlManager' => [
            'enablePrettyUrl' => true,
            'rules' => [
                // ...
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
