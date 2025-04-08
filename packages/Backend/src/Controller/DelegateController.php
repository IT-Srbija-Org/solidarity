<?php
namespace Solidarity\Backend\Controller;

use Skeletor\User\Entity\User;
use Solidarity\Delegate\Service\Delegate;
use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Solidarity\Mailer\Service\Mailer;
use Solidarity\School\Service\School;
use Tamtamchik\SimpleFlash\Flash;

class DelegateController extends AjaxCrudController
{
    const TITLE_VIEW = "View delegate";
    const TITLE_CREATE = "Create new delegate";
    const TITLE_UPDATE = "Edit delegate: ";
    const TITLE_UPDATE_SUCCESS = "Delegate updated successfully.";
    const TITLE_CREATE_SUCCESS = "Delegate created successfully.";
    const TITLE_DELETE_SUCCESS = "Delegate deleted successfully.";
    const PATH = 'Delegate';

    /**
     * @param Delegate $service
     * @param Session $session
     * @param Config $config
     * @param Flash $flash
     * @param Engine $template
     */
    public function __construct(
        Delegate $service, Session $session, Config $config, Flash $flash, Engine $template, private Mailer $mailer,
        private School $school
    ) {
        parent::__construct($service, $session, $config, $flash, $template);
        if ($this->getSession()->getStorage()->offsetGet('loggedInRole') !== User::ROLE_ADMIN) {
            $this->tableViewConfig['createButton'] = false;
        }

    }

    public function form(): Response
    {

        return parent::form();
    }

//    public function create(): Response
//    {
//        die('disabled');
//    }

    /**
     * Sends round start info mail to ALL VERIFIED delegates. Does not know if any mails have been sent already.
     *
     * @return \Psr\Http\Message\ResponseInterface|void
     */
    public function sendRoundStartMailToDelegates()
    {
        ini_set('max_input_time', 600);
        $verifiedDelegates = $this->service->getEntities(['status' => \Solidarity\Delegate\Entity\Delegate::STATUS_VERIFIED]);
        /* @var \Solidarity\Delegate\Entity\Delegate $delegate */
        foreach ($verifiedDelegates as $delegate) {
            $this->mailer->sendRoundStartMailToDelegate($delegate->email);
        }
        return $this->redirect('/delegate/view/');
    }

    public function addSchoolRelation()
    {
        foreach ($this->service->getEntities() as $entity) {
            $school = $this->school->getByNameAndCity(trim($entity->schoolName), trim($entity->city));
            if (!$school) {
                var_dump($entity->schoolName);
                var_dump($entity->city);

                die('school not found');
                $failedData[] = $educatorData;
                continue;
            }
            $this->service->updateField('school', $school->id, $entity->id);
        }
        die('done');
    }
}