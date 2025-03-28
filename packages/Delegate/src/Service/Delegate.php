<?php
namespace Solidarity\Delegate\Service;

use Solidarity\Delegate\Repository\DelegateRepository;
use Skeletor\Core\TableView\Service\TableView;
use Psr\Log\LoggerInterface as Logger;
use Skeletor\User\Service\Session;
use Solidarity\Delegate\Filter\Delegate as DelegateFilter;

class Delegate extends TableView
{

    /**
     * @param DelegateRepository $repo
     * @param Session $user
     * @param Logger $logger
     */
    public function __construct(
        DelegateRepository $repo, Session $user, Logger $logger, DelegateFilter $filter, private \DateTime $dt
    ) {
        parent::__construct($repo, $user, $logger, $filter);
    }

    public function prepareEntities($entities)
    {
        $items = [];
        /* @var \Solidarity\Delegate\Entity\Delegate $delegate */
        foreach ($entities as $delegate) {
            $itemData = [
                'id' => $delegate->getId(),
                'email' =>  [
                    'value' => $delegate->email,
                    'editColumn' => true,
                ],
                'status' => ($delegate->status) ? 'Yes ': 'Ne',
                'schoolType' => $delegate->schoolType,
                'schoolName' => $delegate->schoolName,
                'city' => $delegate->city,
                'phone' => $delegate->phone,
//                'comment' => $delegate->comment,
                'count' => $delegate->count,
                'countBlocking' => $delegate->countBlocking,
                'createdAt' => $delegate->getCreatedAt()->format('d.m.Y'),
//                'updatedAt' => $delegate->getUpdatedAt()->format('d.m.Y'),
            ];
            $items[] = [
                'columns' => $itemData,
                'id' => $delegate->getId(),
            ];
        }
        return $items;
    }

    public function compileTableColumns()
    {

        $columnDefinitions = [
            ['name' => 'email', 'label' => 'Email'],
            ['name' => 'phone', 'label' => 'Phone'],
            ['name' => 'status', 'label' => 'Status', 'filterData' => [0 => 'New', 1 => 'Ready']],
            ['name' => 'schoolType', 'label' => 'Type'],
            ['name' => 'schoolName', 'label' => 'School'],
            ['name' => 'city', 'label' => 'City'],
            ['name' => 'count', 'label' => 'Count'],
            ['name' => 'countBlocking', 'label' => 'Blocking'],
//            ['name' => 'updatedAt', 'label' => 'Updated at', 'priority' => 8],
            ['name' => 'createdAt', 'label' => 'Created at', 'priority' => 9],
        ];

        return $columnDefinitions;
    }

}