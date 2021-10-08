<?php

namespace App\Entity;

use App\Repository\ChoiceColorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChoiceColorRepository::class)
 */
class ChoiceColor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="choiceColors")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="choiceColors")
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity=Color::class, inversedBy="choiceColors")
     */
    private $color;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Products
    {
        return $this->product;
    }

    public function setProduct(?Products $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }
}
