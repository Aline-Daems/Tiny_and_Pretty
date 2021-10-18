<?php

namespace App\Entity;

use App\Repository\ChoiceUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChoiceUserRepository::class)
 */
class ChoiceUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="choiceUser")
     */
    private $myOrder;



    /**
     * @ORM\OneToMany(targetEntity=ChoiceSize::class, mappedBy="choiceUser")
     */
    private $choiceSize;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $product;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user;

    public function __construct()
    {
        $this->myOrder = new ArrayCollection();
        $this->choiceSize = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Order[]
     *
     *   /**
     * @param ArrayCollection $myOrder
     */
    public function setMyOrder(ArrayCollection $myOrder): void
    {
        $this->myOrder = $myOrder;
    }

    public function getMyOrder(): Collection
    {
        return $this->myOrder;
    }

    public function addMyOrder(Order $myOrder): self
    {
        if (!$this->myOrder->contains($myOrder)) {
            $this->myOrder[] = $myOrder;
            $myOrder->setChoiceUser($this);
        }

        return $this;
    }

    public function removeMyOrder(Order $myOrder): self
    {
        if ($this->myOrder->removeElement($myOrder)) {
            // set the owning side to null (unless already changed)
            if ($myOrder->getChoiceUser() === $this) {
                $myOrder->setChoiceUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ChoiceSize[]
     */
    public function getChoiceSize(): Collection
    {
        return $this->choiceSize;
    }

    public function addChoiceSize(ChoiceSize $choiceSize): self
    {
        if (!$this->choiceSize->contains($choiceSize)) {
            $this->choiceSize[] = $choiceSize;
            $choiceSize->setChoiceUser($this);
        }

        return $this;
    }

    /**
     * @param ArrayCollection $choiceSize
     */
    public function setChoiceSize(ArrayCollection $choiceSize): void
    {
        $this->choiceSize = $choiceSize;
    }

    public function removeChoiceSize(ChoiceSize $choiceSize): self
    {
        if ($this->choiceSize->removeElement($choiceSize)) {
            // set the owning side to null (unless already changed)
            if ($choiceSize->getChoiceUser() === $this) {
                $choiceSize->setChoiceUser(null);
            }
        }

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(string $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }


}
