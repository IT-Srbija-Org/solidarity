<?php

namespace Fakture\Backend\Controller;

use Fakture\Tenant\Service\Tenant;
use GuzzleHttp\Psr7\Response;
use Psr\Log\LoggerInterface;
use Fakture\User\Service\User as UserService;
use Laminas\Session\SessionManager as Session;
use Laminas\Config\Config;
use Tamtamchik\SimpleFlash\Flash;
use Skeletor\Core\Validator\ValidatorException;
use League\Plates\Engine;
use Skeletor\Tenant\Repository\TenantRepository;

/**
 * Class UserController
 * @package Fakture\Backend\Controller
 */
class UserController extends \Skeletor\User\Controller\UserController
{
    const TITLE_VIEW = "View users";
    const TITLE_CREATE = "Create user";
    const TITLE_UPDATE = "Edit user: ";
    const TITLE_UPDATE_SUCCESS = "User updated successfully.";
    const TITLE_CREATE_SUCCESS = "User created successfully.";
    const TITLE_DELETE_SUCCESS = "User deleted successfully.";
    const PATH = 'user';

    public function __construct(
        UserService $userService, Session $session, Config $config, Flash $flash, Engine $template, private Tenant $tenant
    ) {
        parent::__construct($userService, $session, $config, $flash, $template);
    }

    public function form(): Response
    {
        $this->formData['tenants'] = $this->tenant->getFilterData();
        $this->formData['loggedInTenantId'] = $this->getSession()->getStorage()->offsetGet('tenantId');
        $id = (int) $this->getRequest()->getAttribute('id');
        if ($id && $this->getSession()->getStorage()->offsetGet('loggedInRole') !== \Skeletor\User\Model\User::ROLE_ADMIN) {
            if ($id !== $this->getSession()->getStorage()->offsetGet('loggedIn')) {
                $this->getFlash()->error('Can only edit owned profile.');

                return $this->redirect(sprintf('/user/form/%s/', $this->getSession()->getStorage()->offsetGet('loggedIn')));
            }
        }
        return parent::form();
    }
}
