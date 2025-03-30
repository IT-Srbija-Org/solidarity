<?php
namespace Solidarity\Educator\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Solidarity\Educator\Entity\Round;
use Solidarity\Educator\Factory\RoundFactory;
use Skeletor\Core\TableView\Repository\TableViewRepository;

class RoundRepository extends TableViewRepository
{
    const ENTITY = Round::class;
    const FACTORY = RoundFactory::class;

    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager);
    }

    public function getSearchableColumns(): array
    {
        return ['amount'];
    }

}