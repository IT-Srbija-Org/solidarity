<?php

namespace Solidarity\Educator\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;
use Solidarity\School\Entity\School;
use Solidarity\Transaction\Entity\TransactionImport;

#[ORM\Entity]
#[ORM\Table(name: 'educatorImport')]
class EducatorImport
{
    use Timestampable;

    const STATUS_NEW = 1;
    const STATUS_FOR_SENDING = 2;
    const STATUS_SENT = 3;
    const STATUS_GAVE_UP = 4;
    const STATUS_RECEIVED = 5;
    const STATUS_DUPLICATE = 6;

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
    #[ORM\ManyToOne(targetEntity: School::class, inversedBy: 'educators')]
    #[ORM\JoinColumn(name: 'schoolId', referencedColumnName: 'id', unique: false, nullable: true)]
    public ?School $school;

    #[ORM\OneToMany(targetEntity: RoundImport::class, mappedBy: 'educator', orphanRemoval: true)]
    public Collection $rounds;

    #[ORM\OneToMany(targetEntity: TransactionImport::class, mappedBy: 'transactions')]
    public Collection $transactions;

    #[ORM\Column(type: 'datetime', insertable: true, updatable: true, options: ['default' => "CURRENT_TIMESTAMP"])]
    public \DateTime $createdAt;

    public static function getHrStatuses(): array
    {
        return array(
            self::STATUS_NEW => 'New',
            self::STATUS_FOR_SENDING => 'For sending',
            self::STATUS_SENT => 'Sent',
            self::STATUS_GAVE_UP => 'Gave up',
            self::STATUS_RECEIVED => 'Received',
            self::STATUS_DUPLICATE => 'Duplicate',
        );
    }

    public static function getHrStatus($status): string
    {
        return static::getHrStatuses()[$status];
    }
}