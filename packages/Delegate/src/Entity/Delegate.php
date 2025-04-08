<?php

namespace Solidarity\Delegate\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;
use Solidarity\School\Entity\School;

#[ORM\Entity]
#[ORM\Table(name: 'delegate')]
class Delegate
{
    use Timestampable;

    const STATUS_NEW = 1;
    const STATUS_VERIFIED = 2;
    const STATUS_PROBLEM = 3;

    #[ORM\Column(type: Types::STRING, length: 128)]
    public string $name;
    #[ORM\Column(type: Types::STRING, length: 255)]
    public string $email;
    #[ORM\Column(type: Types::STRING, length: 16)]
    public string $phone;
    #[ORM\Column(type: Types::SMALLINT)]
    public int $status;
    #[ORM\Column(type: Types::SMALLINT)]
    public int $formLinkSent;
    #[ORM\Column(type: Types::STRING, length: 1024, nullable: true)]
    public ?string $comment;
    #[ORM\Column(type: Types::STRING, length: 64)]
    public string $schoolType;
    #[ORM\Column(type: Types::STRING, length: 128)]
    public string $schoolName;
    #[ORM\Column(type: Types::STRING, length: 128)]
    public string $city;
    #[ORM\Column(type: Types::STRING, nullable: true, length: 255)]
    public ?string $count;
    #[ORM\Column(type: Types::STRING, nullable: true, length: 512)]
    public ?string $countBlocking;
    #[ORM\Column(type: Types::STRING, length: 128)]
    public string $verifiedBy;
    #[ORM\ManyToOne(targetEntity: School::class, inversedBy: 'delegates')]
    #[ORM\JoinColumn(name: 'schoolId', referencedColumnName: 'id', unique: false, nullable: true)]
    public ?School $school;

    public static function getHrStatuses(): array
    {
        return array(
            self::STATUS_NEW => 'New',
            self::STATUS_VERIFIED => 'Verified',
            self::STATUS_PROBLEM => 'Problem',
        );
    }

    public static function getHrStatus($status): string
    {
        return static::getHrStatuses()[$status];
    }
}