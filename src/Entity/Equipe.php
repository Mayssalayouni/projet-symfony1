<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\Column]
    private ?bool $diponibilite = null;

   /* #[ORM\ManyToOne(inversedBy: 'equipes')]
    private ?Researcher $Researcher = null;*/

    #[ORM\ManyToOne(inversedBy: 'equipes')]
    private ?Publication $Publication = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function isDiponibilite(): ?bool
    {
        return $this->diponibilite;
    }

    public function setDiponibilite(bool $diponibilite): static
    {
        $this->diponibilite = $diponibilite;

        return $this;
    }

   /* public function getResearcher(): ?Researcher
    {
        return $this->Researcher;
    }

    public function setResearcher(?Researcher $Researcher): static
    {
        $this->Researcher = $Researcher;

        return $this;
    }*/

    public function getPublication(): ?Publication
    {
        return $this->Publication;
    }

    public function setPublication(?Publication $Publication): static
    {
        $this->Publication = $Publication;

        return $this;
    }
}
