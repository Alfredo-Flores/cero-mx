<?php
return [
    'propel' => [
        'database' => [
            'connections' => [
                'cerodb' => [
                    'adapter' => 'mysql',
                    'dsn' => 'mysql:host=127.0.0.1;dbname=cerodb',
                    'user' => 'root',
                    'password' => '',
                    'settings' => [
                        'charset' => 'utf8'
                    ]
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'cerodb',
            'connections' => ['cerodb']
        ],
        'generator' => [
            'defaultConnection' => 'cerodb',
            'connections' => ['cerodb'],
            'dateTime' => [
                'defaultTimeStampFormat' =>'Y-m-d H:i:s',
                'defaultTimeFormat' => 'H:i:s',
                'defaultDateFormat' => 'Y-m-d'
            ]
        ]
    ]
];
?>
