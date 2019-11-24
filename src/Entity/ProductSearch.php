<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Asserts;
use Doctrine\Common\Collections\ArrayCollection;

class ProductSearch
{

    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     * @Asserts\Range(min=10, max=400)
     */
    private $minPrice;

    /**
     * @var ArrayCollection
     */
    private $options;

    /**
     * PropertySearch constructor.
     */
    public function __construct()
    {
        $this -> options = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getMinPrice(): ?int
    {
        return $this -> minPrice;
    }

    /**
     * @param int|null $minPrice
     */
    public function setMinPrice( ?int $minPrice ): void
    {
        $this -> minPrice = $minPrice;
    }

    /**
     *
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this -> maxPrice;
    }

    /**
     *
     * @param int|null $maxPrice
     * @return ProductSearch
     *
     */
    public function setMaxPrice( int $maxPrice ): ProductSearch
    {
        $this -> maxPrice = $maxPrice;
        return $this;
    }

    /**
     *
     * @return ArrayCollection
     */
    public function getOptions(): ArrayCollection
    {
        return $this -> options;
    }

    /**
     *
     * @param ArrayCollection $options
     *
     */
    public function setOptions( ArrayCollection $options ): void
    {
        $this -> options = $options;
    }
}
