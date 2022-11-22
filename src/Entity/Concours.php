<?php

namespace App\Entity;

use App\Repository\ConcoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConcoursRepository::class)]
class Concours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomconcours = null;

    #[ORM\OneToMany(mappedBy: 'refconcours', targetEntity: Miage::class)]
    private Collection $miages;

    public function __construct()
    {
        $this->miages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomconcours(): ?string
    {
        return $this->nomconcours;
    }

    public function setNomconcours(string $nomconcours): self
    {
        $this->nomconcours = $nomconcours;

        return $this;
    }

    /**
     * @return Collection<int, Miage>
     */
    public function getMiages(): Collection
    {
        return $this->miages;
    }

    public function addMiage(Miage $miage): self
    {
        if (!$this->miages->contains($miage)) {
            $this->miages->add($miage);
            $miage->setRefconcours($this);
        }

        return $this;
    }

    public function removeMiage(Miage $miage): self
    {
        if ($this->miages->removeElement($miage)) {
            // set the owning side to null (unless already changed)
            if ($miage->getRefconcours() === $this) {
                $miage->setRefconcours(null);
            }
        }

        return $this;
    }
}
