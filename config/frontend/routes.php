<?php

/**
 * Define routes here.
 *
 * Routes follow this format:
 *
 * [METHOD, ROUTE, CALLABLE] or
 * [METHOD, ROUTE, [Class => method]]
 *
 * When controller is used without method (as string), it needs to have a magic __invoke method defined.
 *
 * Routes can use optional segments and regular expressions. See nikic/fastroute
 */
//@TODO find a proper way to use adminPath
/**
 * @var $adminPath string secret path to admin
 */
return [
    // backend
    [['GET'], '/', \Solidarity\Frontend\Action\Index::class],
    [['GET', 'POST'], '/donorForm', \Solidarity\Frontend\Action\Donor::class],
    [['GET', 'POST'], '/delegateForm', \Solidarity\Frontend\Action\Delegate::class],
    [['GET', 'POST'], '/educatorForm', \Solidarity\Frontend\Action\Educator::class],


];
