<?php
return [
    'propel' => [
        'database' => [
            'connections' => [
                'cero' => [
                    'adapter' => 'mysql',
                    'dsn' => 'mysql:host=127.0.0.1;dbname=cero',
                    'user' => 'root',
                    'password' => '',
                    'settings' => [
                        'charset' => 'utf8'
                    ]
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'cero',
            'connections' => ['cero']
        ],
        'generator' => [
            'defaultConnection' => 'cero',
            'connections' => ['cero'],
            'dateTime' => [
                'defaultTimeStampFormat' =>'Y-m-d H:i:s',
                'defaultTimeFormat' => 'H:i:s',
                'defaultDateFormat' => 'Y-m-d'
            ]
        ]
    ]
];
?>
