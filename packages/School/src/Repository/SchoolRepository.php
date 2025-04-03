<?php
namespace Solidarity\School\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Skeletor\Core\TableView\Repository\TableViewRepository;
use Solidarity\School\Entity\School;
use Solidarity\School\Factory\SchoolFactory;

class SchoolRepository extends TableViewRepository
{
    const ENTITY = School::class;
    const FACTORY = SchoolFactory::class;

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