<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ThemeRepository")
 * @UniqueEntity("name")
 */
class Theme
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
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", mappedBy="themes")
     */
    private $products;

    public function __construct()
    {
        $this -> products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this -> id;
    }

    public function getName(): ?string
    {
        return $this -> name;
    }

    public function setName( string $name ): self
    {
        $this -> name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this -> createdAt;
    }

    public function setCreatedAt( \DateTimeInterface $createdAt ): self
    {
        $this -> createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this -> products;
    }

    public function setProducts( ?Product $products ): self
    {
        $this -> products = $products;
        return $this;
    }

    public function addProduct( Product $product ): self
    {
        if(!$this -> products -> contains( $product )) {
            $this -> products[] = $product;
            $product->addTheme($this);
        }

        return $this;
    }

    public function removeProduct( Product $product ): self
    {
        if($this -> products -> contains( $product )) {
            $this -> products -> removeElement( $product );
            $product->removeTheme($this);
            if($product -> getThemes() === $this) {
                $product -> setThemes( null );
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this -> name;
    }
}
