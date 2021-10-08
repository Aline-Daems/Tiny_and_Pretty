<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 * @Vich\Uploadable
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
     * ORM\Column(type="string", length=255)
     */
    private $file;


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

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="favoris")
     */
    private $favoris;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="products", orphanRemoval=true, cascade={"persist"})
     */
    private $pictures;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $topImage;
    /**
     * @Vich\UploadableField(mapping="top_image", fileNameProperty="topImage")
     * @Assert\Image(
     *     mimeTypes={"image/webp"}
     * )
     */
    private $topImageFile;

    /**
     * @ORM\OneToMany(targetEntity=Wish::class, mappedBy="product")
     */
    private $wishes;

    /**
     * @ORM\ManyToMany(targetEntity=Size::class, inversedBy="product")
     */
    private $sizes;

    /**
     * @ORM\OneToMany(targetEntity=ChoiceSize::class, mappedBy="product", cascade={"remove"})
     */
    private $choiceSize;

    /**
     * @ORM\ManyToMany(targetEntity=Color::class, inversedBy="products")
     */
    private $Colors;

    /**
     * @ORM\OneToMany(targetEntity=ChoiceColor::class, mappedBy="product")
     */
    private $choiceColors;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCollection;



    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->mode = new ArrayCollection();
        $this->maison = new ArrayCollection();
        $this->boy = new ArrayCollection();
        $this->toys = new ArrayCollection();
        $this->pictures = new ArrayCollection();
        $this->favoris = new ArrayCollection();
        $this->wishes = new ArrayCollection();
        $this->sizes = new ArrayCollection();
        $this->Colors = new ArrayCollection();
        $this->choiceColors = new ArrayCollection();


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

    public function getFile(): ?string
    {
        return $this->file;
    }


    public function setFile(string $file): self
    {
        $this->file = $file;
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

    /**
     * @return Collection|User[]
     */
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(User $favori): self
    {
        if (!$this->favoris->contains($favori)) {
            $this->favoris[] = $favori;
        }

        return $this;
    }

    public function removeFavori(User $favori): self
    {
        $this->favoris->removeElement($favori);

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setProducts($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->contains($picture)) {
            $this->pictures->removeElement($picture);
            // set the owning side to null (unless already changed)
            if ($picture->getProducts() === $this) {
                $picture->setProducts(null);
            }
        }

        return $this;
    }


    /**
     * @return mixed
     */
    public function getTopImageFile()
    {
        return $this->topImageFile;
    }

    /**
     * @param mixed $topImageFile
     * @return Products
     */
    public function setTopImageFile($topImageFile)
    {
        $this->topImageFile = $topImageFile;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTopImage()
    {
        return $this->topImage;
    }

    /**
     * @param mixed $topImage
     * @return Products
     */
    public function setTopImage($topImage)
    {
        $this->topImage = $topImage;
        return $this;
    }

    /**
     * @return Collection|Wish[]
     */
    public function getWishes(): Collection
    {
        return $this->wishes;
    }

    public function addWish(Wish $wish): self
    {
        if (!$this->wishes->contains($wish)) {
            $this->wishes[] = $wish;
            $wish->setProduct($this);
        }

        return $this;
    }

    public function removeWish(Wish $wish): self
    {
        if ($this->wishes->removeElement($wish)) {
            // set the owning side to null (unless already changed)
            if ($wish->getProduct() === $this) {
                $wish->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * perlet de savoir si cette article est dans la wishlist de l'utilisateur
     *
     * @param User $user
     * @return bool
     */
    public function isWishByUser(User $user): bool
    {
        foreach ($this->wishes as $wish) {
            if ($wish->getUser() === $user) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return Collection|Size[]
     */
    public function getSizes(): Collection
    {
        return $this->sizes;
    }

    public function addSize(Size $size): self
    {
        if (!$this->sizes->contains($size)) {
            $this->sizes[] = $size;
            $size->addProduct($this);
        }

        return $this;
    }

    public function removeSize(Size $size): self
    {
        if ($this->sizes->removeElement($size)) {
            $size->removeProduct($this);
        }

        return $this;
    }

    public function getChoiceSize(): ?ChoiceSize
    {
        return $this->choiceSize;
    }

    public function setChoiceSize(?ChoiceSize $choiceSize): self
    {
        $this->choiceSize = $choiceSize;

        return $this;
    }

    /**
     * permet de savoir si cette article est dans le choix de taille de l'utilisateur
     *
     * @param User $user
     * @return bool
     */
    public function isChoiceSizeByUser(User $user): bool
    {
        foreach ($this->choiceSize as $Size) {
            if ($Size->getUser() === $user) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return Collection|Color[]
     */
    public function getColors(): Collection
    {
        return $this->Colors;
    }

    public function addColor(Color $color): self
    {
        if (!$this->Colors->contains($color)) {
            $this->Colors[] = $color;
        }

        return $this;
    }

    public function removeColor(Color $color): self
    {
        $this->Colors->removeElement($color);

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
            $choiceColor->setProduct($this);
        }

        return $this;
    }

    public function removeChoiceColor(ChoiceColor $choiceColor): self
    {
        if ($this->choiceColors->removeElement($choiceColor)) {
            // set the owning side to null (unless already changed)
            if ($choiceColor->getProduct() === $this) {
                $choiceColor->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * permet de savoir si cette article est dans le choix de couleur de l'utilisateur
     *
     * @param User $user
     * @return bool
     */
    public function isChoiceColorByUser(User $user): bool
    {
        foreach ($this->choiceColors as $color) {
            if ($color->getUser() === $user) {
                return true;
            }
        }
        return false;
    }

    public function getIsCollection(): ?bool
    {
        return $this->isCollection;
    }

    public function setIsCollection(?bool $isCollection): self
    {
        $this->isCollection = $isCollection;

        return $this;
    }
}
