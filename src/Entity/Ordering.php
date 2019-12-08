<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderingRepository")
 */
class Ordering
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $orderDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="orderings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderingProduct", mappedBy="orderings")
     */
    private $orderingProducts;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    public function __construct()
    {
        $this->orderingProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function setOrderDate(\DateTimeInterface $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return Collection|OrderingProduct[]
     */
    public function getOrderingProducts(): Collection
    {
        return $this->orderingProducts;
    }

    public function addOrderingProduct(OrderingProduct $orderingProduct): self
    {
        if (!$this->orderingProducts->contains($orderingProduct)) {
            $this->orderingProducts[] = $orderingProduct;
            $orderingProduct->setOrderings($this);
        }

        return $this;
    }

    public function removeOrderingProduct(OrderingProduct $orderingProduct): self
    {
        if ($this->orderingProducts->contains($orderingProduct)) {
            $this->orderingProducts->removeElement($orderingProduct);
            // set the owning side to null (unless already changed)
            if ($orderingProduct->getOrderings() === $this) {
                $orderingProduct->setOrderings(null);
            }
        }

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this -> reference;
    }

}
