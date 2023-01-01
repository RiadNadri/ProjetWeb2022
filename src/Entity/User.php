<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Miage $refMiage = null;

    
    

    #[ORM\ManyToMany(targetEntity: Statut::class, inversedBy: 'users')]
    private Collection $statut;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?TitreTransport $refTitre = null;

    #[ORM\ManyToMany(targetEntity: Activite::class, inversedBy: 'users')]
    private Collection $refActivite;

    public function __construct()
    {
        $this->adminOnUsers = new ArrayCollection();
        $this->statut = new ArrayCollection();
        $this->refActivite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTime $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getRefMiage(): ?miage
    {
        return $this->refMiage;
    }

    public function setRefMiage(?miage $refMiage): self
    {
        $this->refMiage = $refMiage;

        return $this;
    }

    

    

    /**
     * @return Collection<int, Statut>
     */
    public function getStatut(): Collection
    {
        return $this->statut;
    }

    public function addStatut(Statut $statut): self
    {
        if (!$this->statut->contains($statut)) {
            $this->statut->add($statut);
        }

        return $this;
    }

    public function removeStatut(Statut $statut): self
    {
        $this->statut->removeElement($statut);

        return $this;
    }

    public function getRefTitre(): ?TitreTransport
    {
        return $this->refTitre;
    }

    public function setRefTitre(?TitreTransport $refTitre): self
    {
        $this->refTitre = $refTitre;

        return $this;
    }

    /**
     * @return Collection<int, Activite>
     */
    public function getRefActivite(): Collection
    {
        return $this->refActivite;
    }

    public function addRefActivite(Activite $refActivite): self
    {
        if (!$this->refActivite->contains($refActivite)) {
            $this->refActivite->add($refActivite);
        }

        return $this;
    }

    public function removeRefActivite(Activite $refActivite): self
    {
        $this->refActivite->removeElement($refActivite);

        return $this;
    }
}
