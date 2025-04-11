<?php

$guest = [
    '/',
    '/fetchExchangeRate/',
    '/invoice-recurring/createInvoices/',
    '/login/loginForm/',
    '/login/forgotPassword*',
    '/login/login/',
    '/login/resetPassword*',
    '/cron/*',
];

// staff
$level2 = [
    '/delegate/view/*',
    '/delegate/tableHandler/*',
    '/delegate/form/*',
    '/delegate/update/*',
    '/donor/update/*',
    '/donor/view/*',
    '/donor/tableHandler/*',
    '/donor/form/*',
    '/educator/update/*',
    '/educator/view/*',
    '/educator/tableHandler/*',
    '/educator/form/*',
    '/transaction/update/*',
    '/transaction/view/*',
    '/transaction/tableHandler/*',
    '/transaction/form/*',
    '/school/*',
    '/school/*',
    '/schoolType/*',
    '/city/*',


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
    '/educator/addSchoolRelation*',
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
