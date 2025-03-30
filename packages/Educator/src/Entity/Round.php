<?php

namespace Solidarity\Educator\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;

//#[ORM\Entity]
//#[ORM\Table(name: 'educator_round')]
class Round
{
    use Timestampable;

    #[ORM\Column(type: Types::INTEGER)]
    public string $amount;

    #[ORM\ManyToOne(targetEntity: Educator::class, inversedBy: 'rounds')]
    #[ORM\JoinColumn(name: 'educatorId', referencedColumnName: 'id', unique: false)]
    public Educator $educator;

    #[ORM\OneToOne(targetEntity: \Solidarity\Transaction\Entity\Round::class)]
    public \Solidarity\Transaction\Entity\Round $round;
}