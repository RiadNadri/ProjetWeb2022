<?php

namespace App\Entity;

use App\Repository\StatutUsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatutUsersRepository::class)]
class StatutUsers
{
    
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'statutUsers')]
    private ?Statut $refStatut = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'statutUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $refUser = null;

    

    public function getRefStatut(): ?statut
    {
        return $this->refStatut;
    }

    public function setRefStatut(?statut $refStatut): self
    {
        $this->refStatut = $refStatut;

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

    public function _toString(Statut $statut)
    {
        
        return $statut->getNom();
    }
}
