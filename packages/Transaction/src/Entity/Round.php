<?php

namespace Solidarity\Transaction\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;

#[ORM\Entity]
#[ORM\Table(name: 'round')]
class Round
{
    use Timestampable;

    #[ORM\Column(type: Types::STRING, length: 128)]
    public string $name;

    #[ORM\OneToMany(targetEntity: Transaction::class, mappedBy: 'round')]
    public Collection $transactions;
}