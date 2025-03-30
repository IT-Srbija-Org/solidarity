<?php
namespace Solidarity\Backend\Controller;

use Solidarity\Donor\Service\Donor;
use Solidarity\Educator\Service\Educator;
use Solidarity\Mailer\Service\Mailer;
use Solidarity\Transaction\Service\Round;
use Solidarity\Transaction\Service\Transaction;
use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Tamtamchik\SimpleFlash\Flash;

class TransactionController extends AjaxCrudController
{
    const TITLE_VIEW = "View transactions";
    const TITLE_CREATE = "Create new transaction";
    const TITLE_UPDATE = "Edit transaction: ";
    const TITLE_UPDATE_SUCCESS = "Transaction updated successfully.";
    const TITLE_CREATE_SUCCESS = "Transaction created successfully.";
    const TITLE_DELETE_SUCCESS = "Transaction deleted successfully.";
    const PATH = 'Transaction';

    const MAX_DONATIONS = 5;
    const MAX_DONATION_AMOUNT = 30000;

    /**
     * @param Transaction $service
     * @param Session $session
     * @param Config $config
     * @param Flash $flash
     * @param Engine $template
     */
    public function __construct(
        Transaction $service, Session $session, Config $config, Flash $flash, Engine $template,
        private Donor $donor, private Educator $educator, private Transaction $transaction, private Round $round,
        private Mailer $mailer
    ) {
        parent::__construct($service, $session, $config, $flash, $template);
        $this->tableViewConfig['createButton'] = false;
    }

    public function test ()
    {
        $this->mailer->sendDonorRegisteredMail('djavolak@mail.ru');

        die('sent');
    }

    public function mapPayments()
    {
        $round = $this->round->getActiveRound();
        $donorsList = $this->donor->getForMapping();
        $receiversList = $this->educator->getForMapping();

//        var_dump($donorsList);
//        var_dump($receiversList);
//        die();

        $donorCount = array_fill(0, count($donorsList), 0);
        foreach ($receiversList as $receiver) {
            $remainingAmount = $receiver["amount"];
            $i = 0;
            // @TODO test case when same donor donates 2x max donation limit. one donor can donate no more than 30k to single receiver
            // @TODO add limit per transaction
            while ($remainingAmount > 0 && $i < count($donorsList)) {
                if ($donorCount[$i] < static::MAX_DONATIONS && $donorsList[$i]["amountLeft"] > 0) {
                    if ($this->transaction->perPersonLimit($donorsList[$i]["email"], $receiver['name'])) {
                        continue;
                    }

                    $donation = min($donorsList[$i]["amountLeft"], $remainingAmount);
                    // ensure max donation amount per transaction
                    $donation = min($donation, static::MAX_DONATION_AMOUNT);
                    $donorsList[$i]["amountLeft"] -= $donation;
                    $remainingAmount -= $donation;
                    $donorCount[$i]++;
//                    var_dump([
//                        "name" => $receiver["name"],
//                        "accountNumber" => $receiver["accountNumber"],
//                        "amount" => $donation,
//                        "email" => $donorsList[$i]['email'],
//                        'comment' => '',
//                        'status' => 1,
//                    ]);
                    $this->transaction->create([
                        "name" => $receiver["name"],
                        "accountNumber" => $receiver["accountNumber"],
                        "amount" => $donation,
                        "email" => $donorsList[$i]['email'],
                        'comment' => '',
                        'status' => 1,
                        'archived' => 0,
                        'round' => $round->id,
                    ]);
                }
                $i++;
            }
            // receiver nulled, set status to sent
            $this->educator->updateField('status', \Solidarity\Educator\Entity\Educator::STATUS_SENT, $receiver['id']);
        }

        die('done');
    }

    public function startNewRound()
    {
        $this->educator->startNewRound();
        $this->transaction->startNewRound();
        $dt = new \DateTime();
        $this->round->create(['name' => 'runda pocela: ' . $dt->format('d/m')]);

        die('round prepared');
    }

    public function form(): Response
    {

        return parent::form();
    }

    public function create(): Response
    {
        die('disabled');
    }

    public function getEntityData()
    {
        $this->getResponse()->getBody()->write(json_encode($this->service->getEntityData(
            (int) $this->getRequest()->getAttribute('id'), $this->getRequest()->getQueryParams()['currency']
        )));
        $this->getResponse()->getBody()->rewind();

        return $this->getResponse()->withHeader('Content-Type', 'application/json');
    }
}