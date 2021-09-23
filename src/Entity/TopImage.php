<?php

namespace App\Entity;

use App\Repository\TopImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=TopImageRepository::class)
 * @Vich\Uploadable
 */
class TopImage
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
    private $topImage;

    /**
     * @Vich\UploadableField(mapping="top_image", fileNameProperty="topImage")
     * @Assert\Image(
     *     mimeTypes={"image/png","image/webp"}
     * )
     */
    private $topImageFile;

    /**
     * @ORM\OneToOne(targetEntity=Products::class, inversedBy="topImage", orphanRemoval=true, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;
    /**
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="topImage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $products;

    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTopImage()
    {
        return $this->topImage;
    }


    public function setTopImage($topImage): self
    {
        $this->topImage = $topImage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTopImageFile()
    {
        return $this->topImageFile;
    }

    public function setTopImageFile(?File $topImageFile) : void
    {
        $this->topImageFile = $topImageFile;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($topImageFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getProducts(): ?Products
    {
        return $this->products;
    }

    public function setProducts(Products $products): self
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function setUpdatedAt(DateTime $updatedAt):self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt():DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt():DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return TopImage
     */
    public function setCreatedAt(DateTime $createdAt):self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}
