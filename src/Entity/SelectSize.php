<?php

namespace App\Entity;

use App\Repository\SelectSizeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SelectSizeRepository::class)
 */
class SelectSize
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="selectSizes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $MyOrder;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $size;

    public function __toString()
    {
        return $this->getSize();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMyOrder(): ?Order
    {
        return $this->MyOrder;
    }

    public function setMyOrder(?Order $MyOrder): self
    {
        $this->MyOrder = $MyOrder;

        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size): self
    {
        $this->size = $size;

        return $this;
    }
}
