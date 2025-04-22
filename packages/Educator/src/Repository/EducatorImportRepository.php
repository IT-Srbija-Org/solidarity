<?php
namespace Solidarity\Educator\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Solidarity\Educator\Entity\EducatorImport;
use Solidarity\Educator\Entity\Round;
use Skeletor\Core\TableView\Repository\TableViewRepository;
use Solidarity\Educator\Entity\RoundImport;
use Solidarity\Educator\Factory\EducatorImportFactory;
use Solidarity\School\Entity\School;

class EducatorImportRepository extends TableViewRepository
{
    const ENTITY = EducatorImport::class;
    const FACTORY = EducatorImportFactory::class;

    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager);
    }

    public function setRoundAmount($educator, $round, $amount)
    {
        if (count($this->entityManager->getRepository(RoundImport::class)->findBy(['educator' => $educator->id, 'round' => $round]))) {
            return;
        }
        $educatorRound = new RoundImport();
        $educatorRound->round = $round;
        $educatorRound->educator = $educator;
        $educatorRound->amount = $amount;
        $this->entityManager->persist($educatorRound);
        $this->entityManager->flush();
    }

    public function getSearchableColumns(): array
    {
        return ['a.name', 'a.amount', 'a.status', 'a.schoolName', 'a.accountNumber'];
    }

    public function getColumnsToCount(): array
    {
        return ['amount'];
    }
}