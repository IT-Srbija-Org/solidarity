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
    [['GET'], '/hvalaDonatoru', \Solidarity\Frontend\Action\ThankYouDonor::class],
    [['GET'], '/hvalaDelegatu', \Solidarity\Frontend\Action\ThankYouDelegate::class],
    [['GET'], '/hvalaZaOstecenog', \Solidarity\Frontend\Action\ThankYouEducator::class],
    [['GET', 'POST'], '/obrazacDonatori', \Solidarity\Frontend\Action\Donor::class],
    [['GET', 'POST'], '/obrazacDelegati', \Solidarity\Frontend\Action\Delegate::class],
    [['GET', 'POST'], '/obrazacOsteceni', \Solidarity\Frontend\Action\Educator::class],


];
