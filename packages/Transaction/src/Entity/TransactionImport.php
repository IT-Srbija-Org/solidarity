<?php

namespace Solidarity\Transaction\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;
use Solidarity\Donor\Entity\Donor;
use Solidarity\Educator\Entity\EducatorImport;

#[ORM\Entity]
#[ORM\Table(name: 'transactionImport')]
class TransactionImport
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

    #[ORM\ManyToOne(targetEntity: Round::class, inversedBy: 'transaction')]
    #[ORM\JoinColumn(name: 'roundId', referencedColumnName: 'id', unique: false)]
    public Round $round;

    #[ORM\ManyToOne(targetEntity: EducatorImport::class, inversedBy: 'educator')]
    #[ORM\JoinColumn(name: 'educatorId', referencedColumnName: 'id', unique: false)]
    public EducatorImport $educator;

    #[ORM\ManyToOne(targetEntity: Donor::class, inversedBy: 'donor')]
    #[ORM\JoinColumn(name: 'donorId', referencedColumnName: 'id', unique: false)]
    public Donor $donor;

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