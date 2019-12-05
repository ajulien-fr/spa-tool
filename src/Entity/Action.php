<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActionRepository")
 */
class Action
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $depense;

    /**
     * @ORM\Column(type="float")
     */
    private $recette;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $remarque;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contributeur", inversedBy="actions")
     */
    private $contributeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Animal", inversedBy="actions")
     */
    private $animal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
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

    public function getDepense(): ?float
    {
        return $this->depense;
    }

    public function setDepense(float $depense): self
    {
        $this->depense = $depense;

        return $this;
    }

    public function getRecette(): ?float
    {
        return $this->recette;
    }

    public function setRecette(float $recette): self
    {
        $this->recette = $recette;

        return $this;
    }

    public function getRemarque(): ?string
    {
        return $this->remarque;
    }

    public function setRemarque(?string $remarque): self
    {
        $this->remarque = $remarque;

        return $this;
    }

    public function getContributeur(): ?contributeur
    {
        return $this->contributeur;
    }

    public function setContributeur(?contributeur $contributeur): self
    {
        $this->contributeur = $contributeur;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    public function __toString(): ?string
    {
        $str = "$this->type ($this->id)";
        
        return $str;
    }
}
