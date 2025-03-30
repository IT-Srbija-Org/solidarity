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

    public function startNewRound()
    {
        $stmt = $this->entityManager->getConnection()->prepare("UPDATE `educator` SET amount = 0");

        return $stmt->executeQuery();
    }

    public function fetchForMapping()
    {
//        $sql = sprintf("SELECT * FROM solid.educator e where e.status = %s AND e.amount -
//         (SELECT IFNULL(SUM(amount), 0) FROM `transaction` where accountNumber = e.accountNumber and status NOT IN (3)) > 0
//         ORDER BY e.amount DESC", Educator::STATUS_FOR_SENDING);
        $sql = "SELECT * FROM `educator` e where e.status <> 1 AND e.amount - 
         (SELECT IFNULL(SUM(amount), 0) FROM `transaction` where accountNumber = e.accountNumber and status NOT IN (3) and archived = 0) > 0
         ORDER BY e.amount DESC";
        $stmt = $this->entityManager->getConnection()->prepare($sql);
        /* @var \Doctrine\DBAL\Result $result */
        $result = $stmt->executeQuery();

        return $result->fetchAllAssociative();
    }

    public function getSearchableColumns(): array
    {
        return ['name', 'amount', 'status', 'schoolName'];
    }

}