<?php
namespace Solidarity\Transaction\Service;

use Solidarity\Transaction\Repository\TransactionImportRepository;
use Skeletor\Core\TableView\Service\TableView;
use Psr\Log\LoggerInterface as Logger;
use Skeletor\User\Service\Session;
use Solidarity\Transaction\Filter\Transaction as TransactionFilter;

class TransactionImport extends TableView
{
    /**
     * @param TransactionImportRepository $repo
     * @param Session $user
     * @param Logger $logger
     */
    public function __construct(
        TransactionImportRepository $repo, Session $user, Logger $logger
    ) {
        parent::__construct($repo, $user, $logger);
    }

    public function prepareEntities($entities)
    {
        $items = [];
        /* @var \Solidarity\Transaction\Entity\TransactionImport $transaction */
        foreach ($entities as $transaction) {
            $itemData = [
                'id' => $transaction->getId(),
//                'email' =>  [
//                    'value' => $delegate->email,
//                    'editColumn' => true,
//                ],
                'status' => \Solidarity\Transaction\Entity\TransactionImport::getHrStatuses()[$transaction->status],
                'amount' => $transaction->amount,
                'email' => $transaction->email,
                'name' => $transaction->name,
                'accountNumber' => $transaction->accountNumber,
                'archived' => ($transaction->archived) ? 'Yes ': 'No',
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
            ['name' => 'status', 'label' => 'Status', 'filterData' => \Solidarity\Transaction\Entity\TransactionImport::getHrStatuses()],
            ['name' => 'archived', 'label' => 'Archived'],
//            ['name' => 'updatedAt', 'label' => 'Updated at', 'priority' => 8],
            ['name' => 'createdAt', 'label' => 'Created at', 'priority' => 9],
        ];

        return $columnDefinitions;
    }

}