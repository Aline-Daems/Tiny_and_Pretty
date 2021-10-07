<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ColorRepository::class)
 */
class Color
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\ManyToMany(targetEntity=Products::class, mappedBy="Colors")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity=ChoiceColor::class, mappedBy="color")
     */
    private $choiceColors;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->choiceColors = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->Name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Products $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addColor($this);
        }

        return $this;
    }

    public function removeProduct(Products $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeColor($this);
        }

        return $this;
    }

    /**
     * @return Collection|ChoiceColor[]
     */
    public function getChoiceColors(): Collection
    {
        return $this->choiceColors;
    }

    public function addChoiceColor(ChoiceColor $choiceColor): self
    {
        if (!$this->choiceColors->contains($choiceColor)) {
            $this->choiceColors[] = $choiceColor;
            $choiceColor->setColor($this);
        }

        return $this;
    }

    public function removeChoiceColor(ChoiceColor $choiceColor): self
    {
        if ($this->choiceColors->removeElement($choiceColor)) {
            // set the owning side to null (unless already changed)
            if ($choiceColor->getColor() === $this) {
                $choiceColor->setColor(null);
            }
        }

        return $this;
    }
}
