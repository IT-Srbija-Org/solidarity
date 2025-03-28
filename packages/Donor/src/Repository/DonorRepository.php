<?php
namespace Solidarity\Donor\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Solidarity\Donor\Entity\Donor;
use Solidarity\Donor\Factory\DonorFactory;
use Skeletor\Core\TableView\Repository\TableViewRepository;

class DonorRepository extends TableViewRepository
{
    const ENTITY = Donor::class;
    const FACTORY = DonorFactory::class;

    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager);
    }

    public function getSearchableColumns(): array
    {
        return ['email', 'amount', 'status'];
    }

    public function fetchForMapping()
    {
        $sql = "SELECT *,
(SELECT IFNULL(SUM(amount), 0) FROM `transaction` WHERE email = d.email) as sumPaid,
amount - (SELECT IFNULL(SUM(amount), 0) FROM `transaction` WHERE email = d.email) as amountLeft
 FROM solid.donor d HAVING d.amount - sumPaid > 0
         ORDER BY amountLeft DESC";
        //@TODO add period
        $stmt = $this->entityManager->getConnection()->prepare($sql);
        /* @var \Doctrine\DBAL\Result $result */
        $result = $stmt->executeQuery();

        return $result->fetchAllAssociative();
    }
}