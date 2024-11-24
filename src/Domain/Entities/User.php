<?php

namespace Jhonattan\PizzariaDelivery\Domain\Entities;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public string $id;

    #[ORM\Column(type: 'string')]
    public string $name;

}