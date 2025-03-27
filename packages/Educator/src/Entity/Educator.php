<?php

namespace Solidarity\Educator\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;

#[ORM\Entity]
#[ORM\Table(name: 'educator')]
class Educator
{
    use Timestampable;

    #[ORM\Column(type: Types::INTEGER)]
    public string $amount;
    #[ORM\Column(type: Types::STRING, length: 255)]
    public string $name;
    #[ORM\Column(type: Types::STRING)]
    public string $schoolName;
    #[ORM\Column(type: Types::STRING)]
    public string $slipLink;

    #[ORM\Column(type: Types::INTEGER)]
    public int $status;
    #[ORM\Column(type: Types::STRING, length: 16)]
    public string $accountNumber;
    #[ORM\Column(type: Types::STRING, length: 1024, nullable: true)]
    public ?string $comment;

}