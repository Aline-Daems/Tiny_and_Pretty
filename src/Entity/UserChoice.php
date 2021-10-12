<?php

namespace App\Entity;

use App\Repository\UserChoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserChoiceRepository::class)
 */
class UserChoice
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=ChoiceSize::class, inversedBy="userChoices")
     */
    private $ChoiceSize;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Size;

    /**
     * @ORM\ManyToMany(targetEntity=Order::class, inversedBy="userChoices")
     */
    private $MyOrder;

    public function __construct()
    {
        $this->ChoiceSize = new ArrayCollection();
        $this->MyOrder = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|ChoiceSize[]
     */
    public function getChoiceSize(): Collection
    {
        return $this->ChoiceSize;
    }

    public function addChoiceSize(ChoiceSize $choiceSize): self
    {
        if (!$this->ChoiceSize->contains($choiceSize)) {
            $this->ChoiceSize[] = $choiceSize;
        }

        return $this;
    }

    public function removeChoiceSize(ChoiceSize $choiceSize): self
    {
        $this->ChoiceSize->removeElement($choiceSize);

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->Size;
    }

    public function setSize(string $Size): self
    {
        $this->Size = $Size;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getMyOrder(): Collection
    {
        return $this->MyOrder;
    }

    public function addMyOrder(Order $myOrder): self
    {
        if (!$this->MyOrder->contains($myOrder)) {
            $this->MyOrder[] = $myOrder;
        }

        return $this;
    }

    public function removeMyOrder(Order $myOrder): self
    {
        $this->MyOrder->removeElement($myOrder);

        return $this;
    }
}
