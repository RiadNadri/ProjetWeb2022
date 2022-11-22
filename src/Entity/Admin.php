<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ORM\Table(name: '`admin`')]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\OneToMany(mappedBy: 'refAdmins', targetEntity: AdminOnUsers::class)]
    private Collection $adminOnUsers;

    #[ORM\OneToMany(mappedBy: 'refAdmin', targetEntity: AdminOnPartenaires::class)]
    private Collection $adminOnPartenaires;

    public function __construct()
    {
        $this->adminOnUsers = new ArrayCollection();
        $this->adminOnPartenaires = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection<int, AdminOnUsers>
     */
    public function getAdminOnUsers(): Collection
    {
        return $this->adminOnUsers;
    }

    public function addAdminOnUser(AdminOnUsers $adminOnUser): self
    {
        if (!$this->adminOnUsers->contains($adminOnUser)) {
            $this->adminOnUsers->add($adminOnUser);
            $adminOnUser->setRefAdmins($this);
        }

        return $this;
    }

    public function removeAdminOnUser(AdminOnUsers $adminOnUser): self
    {
        if ($this->adminOnUsers->removeElement($adminOnUser)) {
            // set the owning side to null (unless already changed)
            if ($adminOnUser->getRefAdmins() === $this) {
                $adminOnUser->setRefAdmins(null);
            }
        }

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
            $adminOnPartenaire->setRefAdmin($this);
        }

        return $this;
    }

    public function removeAdminOnPartenaire(AdminOnPartenaires $adminOnPartenaire): self
    {
        if ($this->adminOnPartenaires->removeElement($adminOnPartenaire)) {
            // set the owning side to null (unless already changed)
            if ($adminOnPartenaire->getRefAdmin() === $this) {
                $adminOnPartenaire->setRefAdmin(null);
            }
        }

        return $this;
    }
}
