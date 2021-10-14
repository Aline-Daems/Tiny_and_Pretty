<?php

namespace App\Entity;

use App\Repository\ChoiceSizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChoiceSizeRepository::class)
 */
class ChoiceSize
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="choiceSizes")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Size::class, inversedBy="choiceSizes")
     */
    private $size;




    public function __construct()
    {
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getProduct(): Collection
    {
        return $this->product;
    }


    public function setProduct(?Products $products): self
    {
        $this->product = $products;
        return $this;
    }

    public function addProduct(Products $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->setChoiceSize($this);
        }

        return $this;
    }

    public function removeProduct(Products $product): self
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getChoiceSize() === $this) {
                $product->setChoiceSize(null);
            }
        }

        return $this;
    }
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setChoiceSize($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getChoiceSize() === $this) {
                $user->setChoiceSize(null);
            }
        }

        return $this;
    }

    public function setSize($size): void
    {
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function addSize(Size $size): self
    {
        if (!$this->size->contains($size)) {
            $this->size[] = $size;
            $size->setChoiceSize($this);
        }

        return $this;
    }

    public function removeSize(Size $size): self
    {
        if ($this->size->removeElement($size)) {
            // set the owning side to null (unless already changed)
            if ($size->getChoiceSize() === $this) {
                $size->setChoiceSize(null);
            }
        }

        return $this;
    }






}
