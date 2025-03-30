<?php
namespace Solidarity\Transaction\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Solidarity\Transaction\Entity\Round;
use Solidarity\Transaction\Factory\RoundFactory;
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

    public function getActiveRound()
    {
        $qb = $this->entityManager->createQueryBuilder();
        return $qb->select('a.id')
            ->from(static::ENTITY, 'a')
            ->orderBy('a.id', 'DESC')->getQuery()->getFirstResult();
    }

    public function getSearchableColumns(): array
    {
        return ['a.name'];
    }

}