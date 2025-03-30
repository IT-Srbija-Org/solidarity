<?php
namespace Solidarity\Transaction\Service;

use Solidarity\Transaction\Repository\RoundRepository;
use Skeletor\Core\TableView\Service\TableView;
use Psr\Log\LoggerInterface as Logger;
use Skeletor\User\Service\Session;
use Solidarity\Transaction\Filter\Transaction as TransactionFilter;

class Round extends TableView
{
    /**
     * @param RoundRepository $repo
     * @param Session $user
     * @param Logger $logger
     */
    public function __construct(
        RoundRepository $repo, Session $user, Logger $logger, TransactionFilter $filter, private \DateTime $dt
    ) {
        parent::__construct($repo, $user, $logger, $filter);
    }

    public function getActiveRound()
    {
        return $this->getEntities([], 1, ['id' => 'desc'])[0];
    }

    public function prepareEntities($entities)
    {
        $items = [];
        /* @var \Solidarity\Transaction\Entity\Round $round */
        foreach ($entities as $transaction) {
            $itemData = [
                'id' => $transaction->getId(),
                'name' => $transaction->name,
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
            ['name' => 'name', 'label' => 'Name'],
//            ['name' => 'updatedAt', 'label' => 'Updated at', 'priority' => 8],
            ['name' => 'createdAt', 'label' => 'Created at', 'priority' => 9],
        ];

        return $columnDefinitions;
    }

}