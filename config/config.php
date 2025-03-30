<?php

date_default_timezone_set('Europe/Belgrade');

return array(
    'baseUrl' => 'https://solid.djavolak.info',
    'siteName' => 'Solidarity tools',
    'appType' => '',
    'redirectUri' => '/donor/view/',
    'timezone' => 'Europe/Belgrade',
    'adminPath' => '',
    'imageBasePath' => IMAGES_PATH,
    'ignoreTrailingSlash' => true,
    'compileAssets' => false,
    'mailer' => [
        'from' => 'djavolak@mail.ru',
        'fromName' => 'Mreža Solidarnosti',
        'recipients' => [
            'errorNotice' => [
                'djavolak@mail.ru',
            ],
            'general' => [
                'djavolak@mail.ru',
            ],
        ],
        'server' => [],
    ],
    'captcha' => [
        'siteKey' => '',
    ]
);

