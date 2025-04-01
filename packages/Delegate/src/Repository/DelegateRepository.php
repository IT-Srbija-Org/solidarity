<?php
namespace Solidarity\Delegate\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Solidarity\Delegate\Entity\Delegate;
use Solidarity\Delegate\Factory\DelegateFactory;
use Skeletor\Core\TableView\Repository\TableViewRepository;

class DelegateRepository extends TableViewRepository
{
    const ENTITY = Delegate::class;
    const FACTORY = DelegateFactory::class;

    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
        parent::__construct($entityManager);
    }

    public function getSearchableColumns(): array
    {
        return ['a.email', 'a.name', 'a.schoolName', 'a.comment', 'a.verifiedBy', 'a.city'];
    }

}
