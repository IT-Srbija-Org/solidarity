<?php
namespace Solidarity\School\Service;

use Skeletor\Core\TableView\Service\TableView;
use Psr\Log\LoggerInterface as Logger;
use Skeletor\User\Service\Session;
use Solidarity\School\Repository\CityRepository;

class City extends TableView
{
    /**
     * @param CityRepository $repo
     * @param Session $user
     * @param Logger $logger
     */
    public function __construct(
        CityRepository $repo, Session $user, Logger $logger
    ) {
        parent::__construct($repo, $user, $logger);
    }

    public function prepareEntities($entities)
    {
        $items = [];
        /* @var \Solidarity\School\Entity\City $city */
        foreach ($entities as $city) {
            $itemData = [
                'id' => $city->getId(),
                'name' => $city->name,
                'createdAt' => $city->getCreatedAt()->format('d.m.Y'),
            ];
            $items[] = [
                'columns' => $itemData,
                'id' => $city->getId(),
            ];
        }
        return $items;
    }

    public function compileTableColumns()
    {

        $columnDefinitions = [
            ['name' => 'name', 'label' => 'Name'],
//            ['name' => 'updatedAt', 'label' => 'Updated at', 'priority' => 8],
            ['name' => 'createdAt', 'label' => 'Created at'],
        ];

        return $columnDefinitions;
    }

}