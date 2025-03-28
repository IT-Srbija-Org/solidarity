<?php
namespace Solidarity\Transaction\Service;

use Solidarity\Transaction\Repository\TransactionRepository;
use Skeletor\Core\TableView\Service\TableView;
use Psr\Log\LoggerInterface as Logger;
use Skeletor\User\Service\Session;
use Solidarity\Transaction\Filter\Transaction as TransactionFilter;

class Transaction extends TableView
{

    /**
     * @param TransactionRepository $repo
     * @param Session $user
     * @param Logger $logger
     */
    public function __construct(
        TransactionRepository $repo, Session $user, Logger $logger, TransactionFilter $filter, private \DateTime $dt
    ) {
        parent::__construct($repo, $user, $logger, $filter);
    }

    public function prepareEntities($entities)
    {
        $items = [];
        /* @var \Solidarity\Transaction\Entity\Transaction $transaction */
        foreach ($entities as $transaction) {
            $itemData = [
                'id' => $transaction->getId(),
//                'email' =>  [
//                    'value' => $delegate->email,
//                    'editColumn' => true,
//                ],
                'status' => ($transaction->status) ? 'Yes ': 'Ne',
                'amount' => $transaction->amount,
                'email' => $transaction->email,
                'name' => $transaction->name,
                'accountNumber' => $transaction->accountNumber,
                'createdAt' => $transaction->getCreatedAt()->format('d.m.Y'),
//                'updatedAt' => $transaction->getUpdatedAt()->format('d.m.Y'),
            ];
            $items[] = [
                'columns' => $itemData,
                'id' => $transaction->getId(),
            ];
        }
        return $items;
    }

    public function compileTableColumns()
    {

        $columnDefinitions = [
            ['name' => 'email', 'label' => 'Email'],
            ['name' => 'name', 'label' => 'Name'],
            ['name' => 'accountNumber', 'label' => 'Acc Number'],
            ['name' => 'amount', 'label' => 'Amount'],
            ['name' => 'status', 'label' => 'Status', 'filterData' => \Solidarity\Transaction\Entity\Transaction::getHrStatuses()],
//            ['name' => 'updatedAt', 'label' => 'Updated at', 'priority' => 8],
            ['name' => 'createdAt', 'label' => 'Created at', 'priority' => 9],
        ];

        return $columnDefinitions;
    }

}