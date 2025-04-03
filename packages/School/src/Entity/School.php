<?php

namespace Solidarity\School\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;
use Solidarity\Transaction\Entity\Round;

#[ORM\Entity]
#[ORM\Table(name: 'school')]
class School
{
    use Timestampable;

    #[ORM\Column(type: Types::STRING, length: 128)]
    public string $name;

    #[ORM\ManyToOne(targetEntity: SchoolType::class, inversedBy: 'schools')]
    #[ORM\JoinColumn(name: 'typeId', referencedColumnName: 'id', unique: false, nullable: true)]
    public ?SchoolType $schoolType;

    #[ORM\ManyToOne(targetEntity: City::class, inversedBy: 'schools')]
    #[ORM\JoinColumn(name: 'cityId', referencedColumnName: 'id', unique: false)]
    public City $city;

}