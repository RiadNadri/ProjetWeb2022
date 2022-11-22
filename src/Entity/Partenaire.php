<?php

namespace App\Entity;

use App\Repository\PartenaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartenaireRepository::class)]
class Partenaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSociete = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $contact = null;

    #[ORM\Column]
    private ?int $dons_ou_aides = null;

    #[ORM\OneToMany(mappedBy: 'refPartenaire', targetEntity: AdminOnPartenaires::class)]
    private Collection $adminOnPartenaires;

    public function __construct()
    {
        $this->adminOnPartenaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSociete(): ?string
    {
        return $this->nomSociete;
    }

    public function setNomSociete(string $nomSociete): self
    {
        $this->nomSociete = $nomSociete;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getDonsOuAides(): ?int
    {
        return $this->dons_ou_aides;
    }

    public function setDonsOuAides(int $dons_ou_aides): self
    {
        $this->dons_ou_aides = $dons_ou_aides;

        return $this;
    }

    /**
     * @return Collection<int, AdminOnPartenaires>
     */
    public function getAdminOnPartenaires(): Collection
    {
        return $this->adminOnPartenaires;
    }

    public function addAdminOnPartenaire(AdminOnPartenaires $adminOnPartenaire): self
    {
        if (!$this->adminOnPartenaires->contains($adminOnPartenaire)) {
            $this->adminOnPartenaires->add($adminOnPartenaire);
            $adminOnPartenaire->setRefPartenaire($this);
        }

        return $this;
    }

    public function removeAdminOnPartenaire(AdminOnPartenaires $adminOnPartenaire): self
    {
        if ($this->adminOnPartenaires->removeElement($adminOnPartenaire)) {
            // set the owning side to null (unless already changed)
            if ($adminOnPartenaire->getRefPartenaire() === $this) {
                $adminOnPartenaire->setRefPartenaire(null);
            }
        }

        return $this;
    }
}
