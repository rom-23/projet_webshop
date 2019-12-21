<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("username")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min=4, max=100)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @Assert\EqualTo(propertyPath="password",message="Vous n'avez pas tapé le meme mot de passe")
     */
    private $confirmPassword;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="user")
     */
    private $comments;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ordering", mappedBy="users")
     */
    private $orderings;



    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->orderings = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getConfirmPassword()
    {
        return $this -> confirmPassword;
    }

    /**
     * @param mixed $confirmPassword
     */
    public function setConfirmPassword( $confirmPassword ): void
    {
        $this -> confirmPassword = $confirmPassword;
    }

//    public function __construct()
//    {
//        //$this->comments = new ArrayCollection();
//    }

    public function getId(): ?int
    {
        return $this -> id;
    }

    public function getUsername(): ?string
    {
        return $this -> username;
    }

    public function setUsername( string $username ): self
    {
        $this -> username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this -> email;
    }

    public function setEmail( string $email ): self
    {
        $this -> email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this -> password;
    }

    public function setPassword( string $password ): self
    {
        $this -> password = $password;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this -> comments;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this -> createdAt;
    }

    public function setCreatedAt( ?\DateTimeInterface $createdAt ): self
    {
        $this -> createdAt = $createdAt;

        return $this;
    }

    /**
     * Returns the roles granted to the user.
     * @return array
     */
    public function getRoles()
    {
        if($this -> username === 'admin') {
            return ['ROLE_ADMIN'];
        } else {
            return ['ROLE_USER'];
        }
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    public function serialize()
    {
        return serialize( [
            $this -> id,
            $this -> username,
            $this -> password
        ] );
    }

    public function unserialize( $serialized )
    {
        list(
            $this -> id,
            $this -> username,
            $this -> password
            ) = unserialize( $serialized, ['allowed_classes' => false] );
    }

    public function __toString()
    {
        return serialize( $this -> username );
    }

    /**
     * @return Collection|Ordering[]
     */
    public function getOrderings(): Collection
    {
        return $this->orderings;
    }

    public function addOrdering(Ordering $ordering): self
    {
        if (!$this->orderings->contains($ordering)) {
            $this->orderings[] = $ordering;
            $ordering->setUsers($this);
        }

        return $this;
    }

    public function removeOrdering(Ordering $ordering): self
    {
        if ($this->orderings->contains($ordering)) {
            $this->orderings->removeElement($ordering);
            // set the owning side to null (unless already changed)
            if ($ordering->getUsers() === $this) {
                $ordering->setUsers(null);
            }
        }

        return $this;
    }



}
