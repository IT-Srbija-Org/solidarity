<?php

namespace Solidarity\Transaction\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;
use Solidarity\Donor\Entity\Donor;
use Solidarity\Educator\Entity\Educator;

#[ORM\Entity]
#[ORM\Table(name: 'transaction')]
class Transaction
{
    use Timestampable;

    const STATUS_NEW = 1;
    const STATUS_VERIFIED = 2;
    const STATUS_CONFIRMED = 3;
    const STATUS_CANCELLED = 4;

    const PER_PERSON_LIMIT = 30000;

    #[ORM\Column(type: Types::STRING, length: 128)]
    public string $name;
    #[ORM\Column(type: Types::STRING, length: 32)]
    public string $accountNumber;
    #[ORM\Column(type: Types::STRING, length: 64)]
    public string $email;
    #[ORM\Column(type: Types::INTEGER)]
    public int $amount;
    #[ORM\Column(type: Types::INTEGER)]
    public int $status;
    #[ORM\Column(type: Types::STRING, length: 1024, nullable: true)]
    public ?string $comment;
    #[ORM\Column(type: Types::SMALLINT)]
    public int $archived;

    #[ORM\ManyToOne(targetEntity: Round::class, inversedBy: 'transaction')]
    #[ORM\JoinColumn(name: 'roundId', referencedColumnName: 'id', unique: false)]
    public Round $round;

    #[ORM\ManyToOne(targetEntity: Educator::class, inversedBy: 'educator')]
    #[ORM\JoinColumn(name: 'educatorId', referencedColumnName: 'id', unique: false)]
    public Educator $educator;

    #[ORM\ManyToOne(targetEntity: Donor::class, inversedBy: 'donor')]
    #[ORM\JoinColumn(name: 'donorId', referencedColumnName: 'id', unique: false)]
    public Donor $donor;

//    #[ORM\Column(type: 'datetime', insertable: false, updatable: true, options: ['default' => "CURRENT_TIMESTAMP"])]
//    public \DateTime $createdAt;
//
//    #[ORM\Column(type: 'datetime', insertable: false, updatable: true, columnDefinition: "DATETIME DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP")]
//    public \DateTime $updatedAt;

    public static function getHrStatuses(): array
    {
        return array(
            self::STATUS_NEW => 'New',
            self::STATUS_VERIFIED => 'Verified',
            self::STATUS_CONFIRMED => 'Confirmed',
            self::STATUS_CANCELLED => 'Cancelled',
        );
    }
}