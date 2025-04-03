<?php
namespace Solidarity\School\Service;

use Skeletor\Core\TableView\Service\TableView;
use Psr\Log\LoggerInterface as Logger;
use Skeletor\User\Service\Session;
use Solidarity\School\Repository\SchoolTypeRepository;

class SchoolType extends TableView
{
    /**
     * @param SchoolTypeRepository $repo
     * @param Session $user
     * @param Logger $logger
     */
    public function __construct(
        SchoolTypeRepository $repo, Session $user, Logger $logger
    ) {
        parent::__construct($repo, $user, $logger);
    }

    public function prepareEntities($entities)
    {
        $items = [];
        /* @var \Solidarity\School\Entity\SchoolType $schoolType */
        foreach ($entities as $schoolType) {
            $itemData = [
                'id' => $schoolType->getId(),
                'name' => $schoolType->name,
                'createdAt' => $schoolType->getCreatedAt()->format('d.m.Y'),
//                'updatedAt' => $transaction->getUpdatedAt()->format('d.m.Y'),
            ];
            $items[] = [
                'columns' => $itemData,
                'id' => $schoolType->getId(),
            ];
        }
        return $items;
    }

    public function compileTableColumns()
    {

        $columnDefinitions = [
            ['name' => 'name', 'label' => 'School Type'],
//            ['name' => 'updatedAt', 'label' => 'Updated at', 'priority' => 8],
            ['name' => 'createdAt', 'label' => 'Created at', 'priority' => 9],
        ];

        return $columnDefinitions;
    }

}