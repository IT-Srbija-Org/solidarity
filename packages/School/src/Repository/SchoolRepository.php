<?php
namespace Solidarity\School\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Skeletor\Core\TableView\Repository\TableViewRepository;
use Solidarity\School\Entity\School;
use Solidarity\School\Factory\SchoolFactory;

class SchoolRepository extends TableViewRepository
{
    const ENTITY = School::class;
    const FACTORY = SchoolFactory::class;

    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager);
    }

    public function getSearchableColumns(): array
    {
        return ['a.name'];
    }

    public function getByNameAndCity($schoolName, $cityName)
    {
        $sql = "SELECT s.id as cityName FROM `school` s JOIN `city` c ON(s.cityId = c.id) where s.name = :schoolName AND c.name = :cityName";
        $stmt = $this->entityManager->getConnection()->prepare($sql);
        $stmt->bindValue(':schoolName', $schoolName);
        $stmt->bindValue(':cityName', $cityName);

        if (!$stmt->executeQuery()->fetchFirstColumn()[0]) {
            return false;
        }

        return $this->getById($stmt->executeQuery()->fetchFirstColumn()[0]);
    }

}