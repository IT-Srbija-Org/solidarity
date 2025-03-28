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

    public function fetchForMapping()
    {
        $sql = "SELECT * FROM solid.educator e where e.amount - 
         (SELECT IFNULL(SUM(amount), 0) FROM `transaction` where accountNumber = e.accountNumber and status NOT IN (3)) > 0
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