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

    public function getSearchableColumns(): array
    {
        return ['a.amount', 'a.name', 'a.accountNumber', 'a.email'];
    }

}