<?php

namespace App\Entity;

use App\Repository\StatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatutRepository::class)]
class Statut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'refStatut', targetEntity: StatutUsers::class)]
    private Collection $statutUsers;

    public function __construct()
    {
        $this->statutUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, StatutUsers>
     */
    public function getStatutUsers(): Collection
    {
        return $this->statutUsers;
    }

    public function addStatutUser(StatutUsers $statutUser): self
    {
        if (!$this->statutUsers->contains($statutUser)) {
            $this->statutUsers->add($statutUser);
            $statutUser->setRefStatut($this);
        }

        return $this;
    }

    public function removeStatutUser(StatutUsers $statutUser): self
    {
        if ($this->statutUsers->removeElement($statutUser)) {
            // set the owning side to null (unless already changed)
            if ($statutUser->getRefStatut() === $this) {
                $statutUser->setRefStatut(null);
            }
        }

        return $this;
    }
}
