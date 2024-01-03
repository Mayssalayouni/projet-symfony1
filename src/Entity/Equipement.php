<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Discription = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\Column]
    private ?bool $Disponibilite = null;

    #[ORM\ManyToOne(inversedBy: 'equipements')]
    private ?Chercheur $ChercheurAtt = null;

    #[ORM\ManyToOne(inversedBy: 'equipements')]
    private ?Projet $ProjetAtt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDiscription(): ?string
    {
        return $this->Discription;
    }

    public function setDiscription(string $Discription): static
    {
        $this->Discription = $Discription;

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

    public function isDisponibilite(): ?bool
    {
        return $this->Disponibilite;
    }

    public function setDisponibilite(bool $Disponibilite): static
    {
        $this->Disponibilite = $Disponibilite;

        return $this;
    }

    public function getChercheurAtt(): ?Chercheur
    {
        return $this->ChercheurAtt;
    }

    public function setChercheurAtt(?Chercheur $ChercheurAtt): static
    {
        $this->ChercheurAtt = $ChercheurAtt;

        return $this;
    }

    public function getProjetAtt(): ?Projet
    {
        return $this->ProjetAtt;
    }

    public function setProjetAtt(?Projet $ProjetAtt): static
    {
        $this->ProjetAtt = $ProjetAtt;

        return $this;
    }
}
