<?php
namespace Solidarity\Transaction\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Solidarity\Transaction\Entity\Transaction;
use Solidarity\Transaction\Factory\TransactionFactory;
use Skeletor\Core\TableView\Repository\TableViewRepository;

class TransactionRepository extends TableViewRepository
{
    const ENTITY = Transaction::class;
    const FACTORY = TransactionFactory::class;

    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager);
    }

    public function startNewRound()
    {
        $stmt = $this->entityManager->getConnection()->prepare("UPDATE `transaction` SET archived = 1 WHERE archived = 0");

        return $stmt->executeQuery();
    }

    /**
     * Returns if overall limit donated per educator is achieved.
     *
     * @param $donorEmail
     * @param $receiverName
     * @return bool
     */
    public function perPersonLimit($donorEmail, $receiverName)
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('SUM(a.amount)')
            ->from(static::ENTITY, 'a')
            ->where('a.email = :email')
            ->andWhere('a.name = :name');
        $qb->setParameter('email', $donorEmail);
        $qb->setParameter('name', $receiverName);

        return $qb->getQuery()->getSingleScalarResult() > Transaction::PER_PERSON_LIMIT;
    }

    public function getSearchableColumns(): array
    {
        return ['a.amount', 'a.name', 'a.accountNumber', 'a.email'];
    }

}