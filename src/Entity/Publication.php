<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PublicationRepository::class)]
class Publication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $auteur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DatePub = null;

    #[ORM\Column(length: 255)]
    private ?string $resume = null;

    #[ORM\Column(length: 255)]
    private ?string $Projets = null;

    #[ORM\Column(length: 255)]
    private ?string $MotsCle = null;

    #[ORM\ManyToMany(targetEntity: Chercheur::class, mappedBy: 'Publication')]
    private Collection $chercheurs;

    public function __construct()
    {
        $this->chercheurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getDatePub(): ?\DateTimeInterface
    {
        return $this->DatePub;
    }

    public function setDatePub(\DateTimeInterface $DatePub): static
    {
        $this->DatePub = $DatePub;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): static
    {
        $this->resume = $resume;

        return $this;
    }

    public function getProjets(): ?string
    {
        return $this->Projets;
    }

    public function setProjets(string $Projets): static
    {
        $this->Projets = $Projets;

        return $this;
    }

    public function getMotsCle(): ?string
    {
        return $this->MotsCle;
    }

    public function setMotsCle(string $MotsCle): static
    {
        $this->MotsCle = $MotsCle;

        return $this;
    }

    /**
     * @return Collection<int, Chercheur>
     */
    public function getChercheurs(): Collection
    {
        return $this->chercheurs;
    }

    public function addChercheur(Chercheur $chercheur): static
    {
        if (!$this->chercheurs->contains($chercheur)) {
            $this->chercheurs->add($chercheur);
            $chercheur->addPublication($this);
        }

        return $this;
    }

    public function removeChercheur(Chercheur $chercheur): static
    {
        if ($this->chercheurs->removeElement($chercheur)) {
            $chercheur->removePublication($this);
        }

        return $this;
    }
}
