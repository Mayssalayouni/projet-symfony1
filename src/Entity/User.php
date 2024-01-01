<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Researcher = null;

   /*  #[ORM\Column]
    private ?int $Userid = null;*/

    #[ORM\Column(length: 255)]
    private ?string $password = null;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResearcher(): ?string
    {
        return $this->Researcher;
    }

    public function setResearcher(?string $Researcher): static
    {
        $this->Researcher = $Researcher;

        return $this;
    }

   /* public function getUserid(): ?int
    {
        return $this->Userid;
    }

    public function setUserid(int $Userid): static
    {
        $this->Userid = $Userid;

        return $this;
    }*/

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }
}
