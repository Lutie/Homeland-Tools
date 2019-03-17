<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="stuff_type")
 */
class StuffType
{

    use IdTrait;

    use NameTrait;

    use DescriptionTrait;

    /**
     * @ORM\OneToMany(targetEntity="Stuff", mappedBy="type")
     * @ORM\JoinColumn(nullable=true)
     */
    private $stuff;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $price = 0;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $addedPriceByWeight = 0;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $addedPriceByHeight = 0;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $addedPriceByShape = 0;

    public function __toString()
    {
        return (string)$this->getName();
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getAddedPriceByWeight()
    {
        return $this->addedPriceByWeight;
    }

    /**
     * @param mixed $addedPriceByWeight
     */
    public function setAddedPriceByWeight($addedPriceByWeight): void
    {
        $this->addedPriceByWeight = $addedPriceByWeight;
    }

    /**
     * @return mixed
     */
    public function getAddedPriceByHeight()
    {
        return $this->addedPriceByHeight;
    }

    /**
     * @param mixed $addedPriceByHeight
     */
    public function setAddedPriceByHeight($addedPriceByHeight): void
    {
        $this->addedPriceByHeight = $addedPriceByHeight;
    }

    /**
     * @return mixed
     */
    public function getAddedPriceByShape()
    {
        return $this->addedPriceByShape;
    }

    /**
     * @param mixed $addedPriceByShape
     */
    public function setAddedPriceByShape($addedPriceByShape): void
    {
        $this->addedPriceByShape = $addedPriceByShape;
    }

}