<?php

namespace App\Entity;

use App\Repository\ChemiseRepository;
use app\Entity\MarqueChemise;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChemiseRepository::class)]
class Chemise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 5)]
    private ?string $taille = null;

    #[ORM\Column(length: 50)]
    private ?string $couleur = null;

    #[ORM\ManyToOne(inversedBy: 'chemises')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MarqueChemise $marqueChemise = null;

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

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getMarqueChemise(): ?MarqueChemise
    {
        return $this->marqueChemise;
    }

    public function setMarqueChemise(?MarqueChemise $marqueChemise): self
    {
        $this->marqueChemise = $marqueChemise;

        return $this;
    }
}
