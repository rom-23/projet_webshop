<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
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
    private $author;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $products;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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
    public function getAuthor(): ?string
    {
        return $this -> author;
    }

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor( string $author ): self
    {
        $this -> author = $author;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this -> content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent( string $content ): self
    {
        $this -> content = $content;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this -> createdAt;
    }

    /**
     * @param DateTimeInterface $createdAt
     * @return $this
     */
    public function setCreatedAt( DateTimeInterface $createdAt ): self
    {
        $this -> createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Product|null
     */
    public function getProducts(): ?Product
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
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this -> user;
    }

    /**
     * @param User|null $user
     * @return $this
     */
    public function setUser( ?User $user ): self
    {
        $this -> user = $user;

        return $this;
    }

    public function __toString()
    {
        return $this -> author;
    }
}
