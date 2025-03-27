<?php

namespace Solidarity\Donor\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;

#[ORM\Entity]
#[ORM\Table(name: 'donor')]
class Donor
{
    use Timestampable;

    #[ORM\Column(type: Types::INTEGER)]
    public string $amount;
    #[ORM\Column(type: Types::STRING, length: 255)]
    public string $email;
    #[ORM\Column(type: Types::SMALLINT)]
    public string $status;
    #[ORM\Column(type: Types::SMALLINT)]
    public string $monthly;
    #[ORM\Column(type: Types::STRING, length: 1024, nullable: true)]
    public ?string $comment;

}