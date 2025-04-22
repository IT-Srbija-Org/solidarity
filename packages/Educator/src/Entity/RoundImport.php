<?php

namespace Solidarity\Educator\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;

#[ORM\Entity]
#[ORM\Table(name: 'educator_roundImport')]
class RoundImport
{
    use Timestampable;

    #[ORM\Column(type: Types::INTEGER)]
    public string $amount;

    #[ORM\ManyToOne(targetEntity: EducatorImport::class, inversedBy: 'rounds')]
    #[ORM\JoinColumn(name: 'educatorId', referencedColumnName: 'id', unique: false)]
    public EducatorImport $educator;

    #[ORM\ManyToOne(targetEntity: \Solidarity\Transaction\Entity\Round::class, inversedBy: 'rounds')]
    #[ORM\JoinColumn(name: 'roundId', referencedColumnName: 'id', unique: false)]
    public \Solidarity\Transaction\Entity\Round $round;
}