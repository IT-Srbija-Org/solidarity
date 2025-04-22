<?php
namespace Solidarity\Educator\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Solidarity\Educator\Entity\Educator;
use Solidarity\Educator\Entity\Round;
use Solidarity\Educator\Factory\EducatorFactory;
use Skeletor\Core\TableView\Repository\TableViewRepository;
use Solidarity\School\Entity\School;

class EducatorRepository extends TableViewRepository
{
    const ENTITY = Educator::class;
    const FACTORY = EducatorFactory::class;

    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager);
    }

    public function setRoundAmount($educator, $round, $amount)
    {
        if (count($this->entityManager->getRepository(Round::class)->findBy(['educator' => $educator->id, 'round' => $round]))) {
            return;
        }
        $educatorRound = new Round();
        $educatorRound->round = $round;
        $educatorRound->educator = $educator;
        $educatorRound->amount = $amount;
        $this->entityManager->persist($educatorRound);
        $this->entityManager->flush();
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
        return ['a.name', 'a.amount', 'a.status', 'a.schoolName', 'a.accountNumber'];
    }

    public function getColumnsToCount(): array
    {
        return ['amount'];
    }

	public function getAllSchools(): array {
		$schools = $this->entityManager
			->getRepository( School::class )
			->findBy( [], [ 'city' => 'ASC' ] );

		$results = array();

		if ( ! empty( $schools ) ) {
			foreach ( $schools as $school ) {
				$cityName   = $school->city->name;
				$schoolName = $school->name;

				if ( ! isset( $results[ $cityName ] ) ) {
					$results[ $cityName ] = [];
				}

				$results[ $cityName ][] = $schoolName;
			}
		}

		return $results;
	}
}