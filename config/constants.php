<?php

define('APP_PATH', __DIR__ . '/..');
define('ROOT_PATH', APP_PATH);
define('PUBLIC_PATH', __DIR__);
define('DATA_PATH', APP_PATH . '/data');
define('IMAGES_PATH', APP_PATH . '/public/images');
define('IMAGES_URL', '/images');
define('ADMIN_ASSET_PATH', PUBLIC_PATH . '/assets/backend');
define('ADMIN_ASSET_URL', '' . strstr(ADMIN_ASSET_PATH,'/assets'));
define('ADMIN_URL', 'http://fakture.local');
define('DEBUG_BACKEND', true);