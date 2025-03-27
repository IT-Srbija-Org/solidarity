<?php

namespace Solidarity\Delegate\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Skeletor\Core\Entity\Timestampable;

#[ORM\Entity]
#[ORM\Table(name: 'delegate')]
class Delegate
{
    use Timestampable;

    #[ORM\Column(type: Types::STRING, length: 128)]
    public string $name;
    #[ORM\Column(type: Types::STRING, length: 255)]
    public string $email;
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
    #[ORM\Column(type: Types::INTEGER)]
    public int $count;
    #[ORM\Column(type: Types::INTEGER)]
    public int $countBlocking;
    #[ORM\Column(type: Types::STRING, length: 128)]
    public string $verifiedBy;

}