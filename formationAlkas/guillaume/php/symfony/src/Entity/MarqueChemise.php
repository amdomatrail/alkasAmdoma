<?php

namespace App\Entity;

use App\Repository\MarqueChemiseRepository;
use app\Entity\Chemise;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarqueChemiseRepository::class)]
class MarqueChemise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'marqueChemise', targetEntity: Chemise::class, orphanRemoval: true)]
    private Collection $chemises;

    public function __construct()
    {
        $this->chemises = new ArrayCollection();
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
            $chemise->setMarqueChemise($this);
        }

        return $this;
    }

    public function removeChemise(Chemise $chemise): self
    {
        if ($this->chemises->removeElement($chemise)) {
            // set the owning side to null (unless already changed)
            if ($chemise->getMarqueChemise() === $this) {
                $chemise->setMarqueChemise(null);
            }
        }

        return $this;
    }
}
