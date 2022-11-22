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
    private ?admin $refAdmins = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'adminOnUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $refUser = null;

    

    public function getRefAdmins(): ?admin
    {
        return $this->refAdmins;
    }

    public function setRefAdmins(?admin $refAdmins): self
    {
        $this->refAdmins = $refAdmins;

        return $this;
    }

    public function getRefUser(): ?user
    {
        return $this->refUser;
    }

    public function setRefUser(?user $refUser): self
    {
        $this->refUser = $refUser;

        return $this;
    }
}
