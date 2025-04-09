<?php
namespace Solidarity\Delegate\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Solidarity\Delegate\Entity\Delegate;
use Solidarity\Delegate\Factory\DelegateFactory;
use Skeletor\Core\TableView\Repository\TableViewRepository;
use Solidarity\School\Entity\School;
use Solidarity\School\Entity\SchoolType;

class DelegateRepository extends TableViewRepository
{
    const ENTITY = Delegate::class;
    const FACTORY = DelegateFactory::class;

	/*
	 * return DelegateRepository
	 */
    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager);
    }

    public function getAffectedDelegates()
    {
        $sql = "SELECT * FROM delegate d where 
(SELECT count(*) FROM transaction where educatorId IN (
SELECT id FROM educator e WHERE e.schoolid = d.schoolid
) ) > 0";

        $stmt = $this->entityManager->getConnection()->prepare($sql);
        /* @var \Doctrine\DBAL\Result $result */
        $result = $stmt->executeQuery();

        return $result->fetchAllAssociative();
    }

    public function getSearchableColumns(): array
    {
        return ['a.email', 'a.name', 'a.schoolName', 'a.comment', 'a.verifiedBy', 'a.city'];
    }

	public function getAllSchoolTypes(): array {
		$school_types = $this->entityManager
			->getRepository( SchoolType::class )
			->findBy( [], [ 'name' => 'ASC' ] );

		$results = array();

		if ( ! empty( $school_types ) ) {
			$results = array_map( fn( $s ) => $s->name, $school_types );
		}

		return $results;
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
