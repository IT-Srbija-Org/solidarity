<?php

date_default_timezone_set('Europe/Belgrade');

return array(
    'baseUrl' => 'https://solid.djavolak.info',
    'siteName' => 'Solidarity tools',
    'appType' => '',
    'redirectUri' => '/user/view/',
    'timezone' => 'Europe/Belgrade',
    'adminPath' => '',
    'imageBasePath' => IMAGES_PATH,
    'ignoreTrailingSlash' => true,
    'compileAssets' => false,
    'mailRecipients' => [
        'errorNotice' => [
            'djavolak@mail.ru',
        ],
        'contactForm' => [
            'djavolak@mail.ru',
        ],
        'general' => [
            'djavolak@mail.ru',
        ]
    ],
    'captcha' => [
        'siteKey' => '',
    ]
);

