<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecificitiesRepository")
 * @UniqueEntity("name")
 */
class Specificities
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", mappedBy="specificities")
     */
    private $products;

    /**
     * Specificities constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName( string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    /**
     * @param Product|null $products
     * @return $this
     */
    public function setProducts( ?Product $products): self
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function addProduct( Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addSpecificity($this);
        }
        return $this;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function removeProduct( Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            $product->removeSpecificity($this);
            if($product -> getSpecificities() === $this) {
                $product -> setSpecificities( null );
            }
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this -> name;
    }
}
