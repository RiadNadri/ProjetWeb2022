<?php

namespace App\Entity;

use App\Repository\AdminOnUsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminOnUsersRepository::class)]
class AdminOnUsers
{
   

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'adminOnUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Admin $refAdmins = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'adminOnUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $refUser = null;

    

    public function getRefAdmins(): ?admin
    {
        return $this->refAdmins;
    }

    public function setRefAdmins(?admin $refAdmins): self
    {
        $this->refAdmins = $refAdmins;

        return $this;
    }

    public function getRefUser(): ?User
    {
        return $this->refUser;
    }

    public function setRefUser(?User $refUser): self
    {
        $this->refUser = $refUser;

        return $this;
    }
}
