<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $illustration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="products", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Mode::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mode;

    /**
     * @ORM\ManyToMany(targetEntity=Maison::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $maison;

    /**
     * @ORM\ManyToMany(targetEntity=Boy::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $boy;

    /**
     * @ORM\ManyToMany(targetEntity=Toys::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $toys;

    /**
     * @ORM\ManyToMany(targetEntity=Accessory::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $accessory;


    /**
     * @ORM\Column(type="boolean")
     */
    private $isBest;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Soldout;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isNew;





    public function __construct(){
        $this->category = new ArrayCollection();
        $this->mode = new ArrayCollection();
        $this->maison = new ArrayCollection();
        $this->boy = new ArrayCollection();
        $this->toys = new ArrayCollection();

    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(string $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }




    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
    * @return Collection|Category[]
    */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Mode[]
     */
    public function getMode(): Collection
    {
        return $this->mode;
    }

    public function setMode(?Mode $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @return Collection|Maison[]
     */
    public function getMaison(): Collection
    {
        return $this->maison;
    }

    public function setMaison(?Maison $maison): self
    {
        $this->maison = $maison;

        return $this;
    }

    /**
     * @return Collection|Boy[]
     */
    public function getBoy(): Collection
    {
        return $this->boy;
    }

    public function setBoy(?Boy $boy): self
    {
        $this->boy = $boy;

        return $this;
    }

    /**
     * @return Collection|Toys[]
     */
    public function getToys(): Collection
    {
        return $this->toys;
    }

    public function setToys(?Toys $toys): self
    {
        $this->toys = $toys;

        return $this;
    }

    /**
     * @return Collection|Accessory[]
     */
    public function getAccessory(): Collection
    {
        return $this->accessory;
    }

    public function setAccessory(?Accessory $accessory): self
    {
        $this->accessory = $accessory;

        return $this;
    }



    public function getIsBest(): ?bool
    {
        return $this->isBest;
    }

    public function setIsBest(bool $isBest): self
    {
        $this->isBest = $isBest;

        return $this;
    }

    public function getSoldout(): ?bool
    {
        return $this->Soldout;
    }

    public function setSoldout(bool $Soldout): self
    {
        $this->Soldout = $Soldout;

        return $this;
    }

    public function getIsNew(): ?bool
    {
        return $this->isNew;
    }

    public function setIsNew(bool $isNew): self
    {
        $this->isNew = $isNew;

        return $this;
    }

}
