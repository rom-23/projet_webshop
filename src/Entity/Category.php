<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @UniqueEntity("title")
 */
class Category
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $catDescription;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="category")
     *
     */
    private $products;

//    public function __construct()
//    {
//        $this->products = new ArrayCollection();
//    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCatDescription(): ?string
    {
        return $this->catDescription;
    }

    public function setCatDescription(string $catDescription): self
    {
        $this->catDescription = $catDescription;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

//    public function addProduct(Product $product): self
//    {
//        if (!$this->products->contains($product)) {
//            $this->products[] = $product;
//            $product->setCategory($this);
//        }
//
//        return $this;
//    }
//
//    public function removeProduct(Product $product): self
//    {
//        if ($this->products->contains($product)) {
//            $this->products->removeElement($product);
//            // set the owning side to null (unless already changed)
//            if ($product->getCategory() === $this) {
//                $product->setCategory(null);
//            }
//        }
//
//        return $this;
//    }
    public function __toString()
    {
        return $this->title;
    }
}
