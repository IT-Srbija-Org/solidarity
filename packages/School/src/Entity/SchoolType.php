<?php

namespace Solidarity\School\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;
use Solidarity\Transaction\Entity\Round;

#[ORM\Entity]
#[ORM\Table(name: 'schoolType')]
class SchoolType
{
    use Timestampable;

    #[ORM\Column(type: Types::STRING, length: 64)]
    public string $name;

    #[ORM\OneToMany(targetEntity: School::class, mappedBy: 'schoolType')]
    public Collection $schools;
}