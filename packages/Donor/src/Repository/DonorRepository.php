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

}