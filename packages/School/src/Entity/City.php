<?php

namespace Solidarity\School\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;
use Solidarity\Transaction\Entity\Round;

#[ORM\Entity]
#[ORM\Table(name: 'city')]
class City
{
    use Timestampable;

    #[ORM\Column(type: Types::STRING, length: 128)]
    public string $name;

    #[ORM\OneToMany(targetEntity: School::class, mappedBy: 'city')]
    public Collection $schools;

}