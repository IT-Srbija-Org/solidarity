<?php
namespace Solidarity\School\Service;

use Skeletor\Core\TableView\Service\TableView;
use Psr\Log\LoggerInterface as Logger;
use Skeletor\User\Service\Session;
use Solidarity\School\Repository\SchoolRepository;

class School extends TableView
{
    /**
     * @param SchoolRepository $repo
     * @param Session $user
     * @param Logger $logger
     */
    public function __construct(
        SchoolRepository $repo, Session $user, Logger $logger
    ) {
        parent::__construct($repo, $user, $logger);
    }

    public function prepareEntities($entities)
    {
        $items = [];
        /* @var \Solidarity\School\Entity\School $school */
        foreach ($entities as $school) {
            $itemData = [
                'id' => $school->getId(),
                'name' =>  [
                    'value' => $school->name,
                    'editColumn' => true,
                ],
                'schoolType' => $school->schoolType->name,
                'city' => $school->city->name,
                'createdAt' => $school->getCreatedAt()->format('d.m.Y'),
//                'updatedAt' => $transaction->getUpdatedAt()->format('d.m.Y'),
            ];
            $items[] = [
                'columns' => $itemData,
                'id' => $school->getId(),
            ];
        }
        return $items;
    }

    public function compileTableColumns()
    {

        $columnDefinitions = [
            ['name' => 'name', 'label' => 'Name'],
            ['name' => 'schoolType', 'label' => 'School Type'],
            ['name' => 'city', 'label' => 'City'],
//            ['name' => 'updatedAt', 'label' => 'Updated at', 'priority' => 8],
            ['name' => 'createdAt', 'label' => 'Created at', 'priority' => 9],
        ];

        return $columnDefinitions;
    }

}