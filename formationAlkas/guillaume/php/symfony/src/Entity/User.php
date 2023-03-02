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
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, unique: true)]
    private ?string $username = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateInscription = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateConnexion = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Chemise::class)]
    private Collection $chemises;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: MarqueChemise::class)]
    private Collection $marqueChemises;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
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
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getDateConnexion(): ?\DateTimeInterface
    {
        return $this->dateConnexion;
    }

    public function setDateConnexion(\DateTimeInterface $dateConnexion): self
    {
        $this->dateConnexion = $dateConnexion;

        return $this;
    }
    public function __construct()
    {
        $this->setDateInscription(new \DateTime());
        $this->setDateConnexion(new \DateTime());
        $this->chemises = new ArrayCollection();
        $this->marqueChemises = new ArrayCollection();
    }

    /**
     * @return Collection<int, Chemise>
     */
    public function getChemises(): Collection
    {
        return $this->chemises;
    }

    public function addChemise(Chemise $chemise): self
    {
        if (!$this->chemises->contains($chemise)) {
            $this->chemises->add($chemise);
            $chemise->setUser($this);
        }

        return $this;
    }

    public function removeChemise(Chemise $chemise): self
    {
        if ($this->chemises->removeElement($chemise)) {
            // set the owning side to null (unless already changed)
            if ($chemise->getUser() === $this) {
                $chemise->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MarqueChemise>
     */
    public function getMarqueChemises(): Collection
    {
        return $this->marqueChemises;
    }

    public function addMarqueChemise(MarqueChemise $marqueChemise): self
    {
        if (!$this->marqueChemises->contains($marqueChemise)) {
            $this->marqueChemises->add($marqueChemise);
            $marqueChemise->setUser($this);
        }

        return $this;
    }

    public function removeMarqueChemise(MarqueChemise $marqueChemise): self
    {
        if ($this->marqueChemises->removeElement($marqueChemise)) {
            // set the owning side to null (unless already changed)
            if ($marqueChemise->getUser() === $this) {
                $marqueChemise->setUser(null);
            }
        }

        return $this;
    }
}
