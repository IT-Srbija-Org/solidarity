<?php
namespace Solidarity\School\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Skeletor\Core\TableView\Repository\TableViewRepository;
use Solidarity\School\Entity\SchoolType;
use Solidarity\School\Factory\SchoolTypeFactory;

class SchoolTypeRepository extends TableViewRepository
{
    const ENTITY = SchoolType::class;
    const FACTORY = SchoolTypeFactory::class;

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