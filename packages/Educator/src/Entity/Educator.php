<?php

namespace Solidarity\Educator\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;

#[ORM\Entity]
#[ORM\Table(name: 'educator')]
class Educator
{
    use Timestampable;

    const STATUS_NEW = 1;
    const STATUS_FOR_SENDING = 2;
    const STATUS_SENT = 3;

    #[ORM\Column(type: Types::INTEGER)]
    public int $amount;
    #[ORM\Column(type: Types::STRING, length: 255)]
    public string $name;
    #[ORM\Column(type: Types::STRING)]
    public string $schoolName;
    #[ORM\Column(type: Types::STRING, nullable: true)]
    public ?string $slipLink;
    #[ORM\Column(type: Types::STRING)]
    public string $city;

    #[ORM\Column(type: Types::INTEGER)]
    public int $status;
    #[ORM\Column(type: Types::STRING, length: 32)]
    public string $accountNumber;
    #[ORM\Column(type: Types::STRING, length: 1024, nullable: true)]
    public ?string $comment;

//    #[ORM\OneToMany(targetEntity: Round::class, mappedBy: 'educator')]
//    public Collection $rounds;

    public static function getHrStatuses(): array
    {
        return array(
            self::STATUS_NEW => 'New',
            self::STATUS_FOR_SENDING => 'For sending',
            self::STATUS_SENT => 'Sent',
        );
    }

    public static function getHrStatus($status): string
    {
        return static::getHrStatuses()[$status];
    }
}