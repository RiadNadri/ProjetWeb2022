<?php

namespace App\Entity;

use App\Repository\StatutUsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatutUsersRepository::class)]
class StatutUsers
{
    
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'statutUsers')]
    private ?statut $refStatut = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'statutUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $refUser = null;

    

    public function getRefStatut(): ?statut
    {
        return $this->refStatut;
    }

    public function setRefStatut(?statut $refStatut): self
    {
        $this->refStatut = $refStatut;

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
