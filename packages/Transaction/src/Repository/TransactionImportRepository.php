<?php
namespace Solidarity\Transaction\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Solidarity\Transaction\Entity\TransactionImport;
use Solidarity\Transaction\Factory\TransactionImportFactory;
use Skeletor\Core\TableView\Repository\TableViewRepository;

class TransactionImportRepository extends TableViewRepository
{
    const ENTITY = TransactionImport::class;
    const FACTORY = TransactionImportFactory::class;

    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager);
    }

    public function getSearchableColumns(): array
    {
        return ['a.amount', 'a.name', 'a.accountNumber', 'a.email'];
    }

    public function getColumnsToCount(): array
    {
        return ['amount'];
    }

}