<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?float $tarif = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Logement $refLogement = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Transport $refTransport = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Activites $refActivite = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(float $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getRefLogement(): ?Logement
    {
        return $this->refLogement;
    }

    public function setRefLogement(?Logement $refLogement): self
    {
        $this->refLogement = $refLogement;

        return $this;
    }

    public function getRefTransport(): ?Transport
    {
        return $this->refTransport;
    }

    public function setRefTransport(?Transport $refTransport): self
    {
        $this->refTransport = $refTransport;

        return $this;
    }

    public function getRefActivite(): ?Activites
    {
        return $this->refActivite;
    }

    public function setRefActivite(?Activites $refActivite): self
    {
        $this->refActivite = $refActivite;

        return $this;
    }

    
}
