<?php

namespace App\Entity;

use App\Repository\AdminOnPartenairesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminOnPartenairesRepository::class)]
class AdminOnPartenaires
{
    

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'adminOnPartenaires')]
    private ?Admin $refAdmin = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'adminOnPartenaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?partenaire $refPartenaire = null;

    

    public function getRefAdmin(): ?Admin
    {
        return $this->refAdmin;
    }

    public function setRefAdmin(?Admin $refAdmin): self
    {
        $this->refAdmin = $refAdmin;

        return $this;
    }

    public function getRefPartenaire(): ?partenaire
    {
        return $this->refPartenaire;
    }

    public function setRefPartenaire(?partenaire $refPartenaire): self
    {
        $this->refPartenaire = $refPartenaire;

        return $this;
    }
}
