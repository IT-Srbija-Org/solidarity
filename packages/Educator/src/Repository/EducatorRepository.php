<?php
namespace Solidarity\Educator\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Solidarity\Educator\Entity\Educator;
use Solidarity\Educator\Factory\EducatorFactory;
use Skeletor\Core\TableView\Repository\TableViewRepository;

class EducatorRepository extends TableViewRepository
{
    const ENTITY = Educator::class;
    const FACTORY = EducatorFactory::class;

    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager);
    }

    public function getSearchableColumns(): array
    {
        return ['name', 'amount', 'status', 'schoolName'];
    }

}