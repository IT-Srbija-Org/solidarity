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
    [['GET'], '/', \Solidarity\Backend\Action\Index::class],
    [['GET', 'POST'], '/login/{action}[/{token}]', \Skeletor\Login\Controller\LoginController::class],
    [['GET', 'POST'], '/image/{action}[/{token}]', \Skeletor\Image\Controller\ImageController::class],
    [['GET', 'POST'], '/user/{action}[/{id}]', \Skeletor\User\Controller\UserController::class],
    [['GET', 'POST'], '/donor/{action}[/{id}]', \Solidarity\Backend\Controller\DonorController::class],
    [['GET', 'POST'], '/delegate/{action}[/{id}]', \Solidarity\Backend\Controller\DelegateController::class],
    [['GET', 'POST'], '/educator/{action}[/{id}]', \Solidarity\Backend\Controller\EducatorController::class],
    [['GET', 'POST'], '/transaction/{action}[/{id}]', \Solidarity\Backend\Controller\TransactionController::class],
    [['GET', 'POST'], '/school/{action}[/{id}]', \Solidarity\Backend\Controller\SchoolController::class],
    [['GET', 'POST'], '/schoolType/{action}[/{id}]', \Solidarity\Backend\Controller\SchoolTypeController::class],
    [['GET', 'POST'], '/city/{action}[/{id}]', \Solidarity\Backend\Controller\CityController::class],


];
