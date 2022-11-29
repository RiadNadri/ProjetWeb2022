<?php

namespace App\Entity;

use App\Repository\MiageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MiageRepository::class)]
class Miage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $universite = null;

    #[ORM\Column]
    private ?int $numtel = null;

    #[ORM\ManyToOne(inversedBy: 'miages')]
    private ?Concours $refconcours = null;

    #[ORM\OneToMany(mappedBy: 'refMiage', targetEntity: User::class)]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUniversite(): ?string
    {
        return $this->universite;
    }

    public function setUniversite(string $universite): self
    {
        $this->universite = $universite;

        return $this;
    }

    public function getNumtel(): ?int
    {
        return $this->numtel;
    }

    public function setNumtel(int $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getRefconcours(): ?Concours
    {
        return $this->refconcours;
    }

    public function setRefconcours(?Concours $refconcours): self
    {
        $this->refconcours = $refconcours;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setRefMiage($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getRefMiage() === $this) {
                $user->setRefMiage(null);
            }
        }

        return $this;
    }

    
}
