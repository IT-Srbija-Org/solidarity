<?php
namespace Solidarity\School\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Skeletor\Core\TableView\Repository\TableViewRepository;
use Solidarity\School\Entity\City;
use Solidarity\School\Factory\CityFactory;

class CityRepository extends TableViewRepository
{
    const ENTITY = City::class;
    const FACTORY = CityFactory::class;

    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager);
    }

    public function getSearchableColumns(): array
    {
        return ['a.name'];
    }

}