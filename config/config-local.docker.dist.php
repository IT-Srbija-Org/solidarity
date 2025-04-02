<?php
return array(
    'baseUrl' => 'http://localhost:8585',
    'adminUrl' => 'http://localhost:8080',
    'db' => [
        'write' => [
            'host' => 'mysql',
            'port' => 3306,
            'name' => 'solid',
            'user' => 'root',
            'pass' => 'rootpass'
        ],
        'read' => [
            [
                'host' => 'mysql',
                'port' => 3306,
                'name' => 'solid',
                'user' => 'root',
                'pass' => 'rootpass'
            ]
        ],
    ],
    'redis' => [
        'hosts' => [
            'redis' => 6379
        ]
    ],
    'mailServer' => [
        'name' => 'smtp.gmail.com',
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'connection_class' => 'plain',
        'connection_config' => [
            'username' => '',
            'password' => '',
            'ssl'      => 'tls',
        ],
    ],
    'captcha' => [
        'siteKey' => ''
    ],
    'mailer' => [
        'server' => [
            'mailersend' => 'fake-key-for-local-env',
        ]
    ]

);

