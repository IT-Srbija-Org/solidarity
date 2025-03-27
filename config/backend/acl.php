<?php

$guest = [
    '/',
    '/fetchExchangeRate/',
    '/invoice-recurring/createInvoices/',
    '/login/loginForm/',
    '/login/login/',
    '/login/resetPassword',
    '/cron/*',
];

// merchant staff
$level2 = [
    '/user/view/*',
    '/user/update/*',
    '/login/logout/',
];

$level1 = [
    '/cache/*',
    '/user/*',
    '/donor/*',
    '/delegate/*',
    '/transaction/*',
    '/educator/*',
    '/template/*',
    '/translator/*',
    '/activity/*',
];

//can also see everything level2 can see
$level1 = array_merge($level2, $level1);

return [
    0 => $guest,
    1 => $level1,
    2 => $level2,
];