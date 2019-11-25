<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $firstname;
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $lastname;
    /**
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/[0-9]{10}/")
     */
    private $phone;
    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;
    /**
     * @var Product|null
     */
    private $product;

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this -> product;
    }

    /**
     * @param Product|null $product
     */
    public function setProduct( ?Product $product ): void
    {
        $this -> product = $product;
    }


    /**
     *
     * @return mixed
     */
    public function getFirstname()
    {
        return $this -> firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname( $firstname ): void
    {
        $this -> firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this -> lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname( $lastname ): void
    {
        $this -> lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this -> phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone( $phone ): void
    {
        $this -> phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this -> email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail( $email ): void
    {
        $this -> email = $email;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this -> message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage( $message ): void
    {
        $this -> message = $message;
    }


}