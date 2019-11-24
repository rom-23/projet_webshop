<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @UniqueEntity("name")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Length(min=5,max=255)
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="products")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="products")
     */
    private $comments;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Specificities", inversedBy="products")
     */
    private $specificities;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Theme", inversedBy="products")
     */
    private $themes;

    /**
     * @ORM\Column(type="boolean", options={"default" = 0})
     */
    private $sold;


    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this -> createdAt = new \DateTime();
        $this -> specificities = new ArrayCollection();
        $this -> comments = new ArrayCollection();
        $this -> themes = new ArrayCollection();
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this -> id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this -> name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName( string $name ): self
    {
        $this -> name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this -> description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription( string $description ): self
    {
        $this -> description = $description;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this -> price;
    }

    public function setPrice( float $price ): self
    {
        $this -> price = $price;

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
   public function getSold(): ?bool
    {
        return $this->sold;
    }

    public function setSold(bool $sold): self
    {
        $this->sold = $sold;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this -> category;
    }

    /**
     * @param Category|null $category
     * @return $this
     */
    public function setCategory( ?Category $category ): self
    {
        $this -> category = $category;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this -> image;
    }

    /**
     * @param string $image
     * @return $this
     */
    public function setImage( string $image ): self
    {
        $this -> image = $image;
        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this -> images;
    }

//    /**
//     * @param Image $image
//     * @return $this
//     */
//    public function addImage( Image $image ): self
//    {
//        if(!$this -> images -> contains( $image )) {
//            $this -> images[] = $image;
//            $image -> setProducts( $this );
//        }
//        return $this;
//    }
//
//    /**
//     * @param Image $image
//     * @return $this
//     */
//    public function removeImage( Image $image ): self
//    {
//        if($this -> images -> contains( $image )) {
//            $this -> images -> removeElement( $image );
//            // set the owning side to null (unless already changed)
//            if($image -> getProducts() === $this) {
//                $image -> setProducts( null );
//            }
//        }
//
//        return $this;
//    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this -> comments;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
    public function addComment( Comment $comment ): self
    {
        if(!$this -> comments -> contains( $comment )) {
            $this -> comments[] = $comment;
            $comment -> setProducts( $this );
        }
        return $this;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
    public function removeComment( Comment $comment ): self
    {
        if($this -> comments -> contains( $comment )) {
            $this -> comments -> removeElement( $comment );
            // set the owning side to null (unless already changed)
            if($comment -> getProducts() === $this) {
                $comment -> setProducts( null );
            }
        }
        return $this;
    }

    /**
     * @param Specificities|null $specificity
     * @return $this
     */
    public function setSpecificities( ?Specificities $specificity ): self
    {
        $this -> specificities = $specificity;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getSpecificities(): Collection
    {
        return $this -> specificities;
    }

    /**
     * @param Specificities $specificity
     * @return $this
     */
    public function addSpecificity( Specificities $specificity ): self
    {
        if(!$this -> specificities -> contains( $specificity )) {
            $this -> specificities[] = $specificity;
            $specificity -> addProduct( $this );
        }
        return $this;
    }

    public function removeSpecificity( Specificities $specificity ): self
    {
        if($this -> specificities -> contains( $specificity )) {
            $this -> specificities -> removeElement( $specificity );
            $specificity -> removeProduct( $this );
            // set the owning side to null (unless already changed)
            if($specificity -> getProducts() === $this) {
                $specificity -> setProducts( null );
            }
        }
        return $this;
    }

    /**
     * @return Collection|Theme[]
     */
    public function getThemes(): Collection
    {
        return $this -> themes;
    }

    public function setThemes( ?Theme $theme ): self
    {
        $this -> themes = $theme;
        return $this;
    }

    public function addTheme( Theme $theme ): self
    {
        if(!$this -> themes -> contains( $theme )) {
            $this -> themes[] = $theme;
            $theme -> addProduct( $this );
        }
        return $this;
    }

    public function removeTheme( Theme $theme ): self
    {
        if($this -> themes -> contains( $theme )) {
            $this -> themes -> removeElement( $theme );
            $theme -> removeProduct( $this );
            if($theme -> getProducts() === $this) {
                $theme -> setProducts( null );
            }
        }
        return $this;
    }

    public function __toString()
    {
        return $this -> name;
    }



}
