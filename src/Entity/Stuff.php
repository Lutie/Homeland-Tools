<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class Stuff
{

    use IdTrait;

    use NameTrait;

    /**
     * @ORM\Column(type="string", length=20)
     * Values : "Weapon", "Armor", "Tools"
     */
    private $type = "n/a";

    use DescriptionTrait;

    /**
     * @ORM\Column(type="integer", length=5)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = 0, max = 9 )
     */
    private $category = 0;

    /**
     * @ORM\Column(type="integer", length=5)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -6, max = 6 )
     */
    private $quality = 0;

    /**
     * @ORM\Column(type="integer", length=5)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -2, max = 2 )
     */
    private $height = 0;

    /**
     * @ORM\Column(type="integer", length=5)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -2, max = 2 )
     */
    private $weight = 0;

    /**
     * @ORM\ManyToOne(targetEntity="StuffFamily", inversedBy="stuff")
     * @ORM\Column(nullable=true)
     */
    private $family;

    /**
     * @ORM\ManyToMany(targetEntity="StuffParticularity")
     * @ORM\Column(nullable=true)
     */
    private $particularities;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $price = 0;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $weaponGrip;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $weaponKind;

    public function __construct()
    {
        $this->particularities = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param mixed $quality
     */
    public function setQuality($quality): void
    {
        $this->quality = $quality;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @param mixed $family
     */
    public function setFamily($family): void
    {
        $this->family = $family;
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
    public function getWeaponGrip()
    {
        return $this->weaponGrip;
    }

    /**
     * @param mixed $weaponGrip
     */
    public function setWeaponGrip($weaponGrip): void
    {
        $this->weaponGrip = $weaponGrip;
    }

    /**
     * @return mixed
     */
    public function getWeaponKind()
    {
        return $this->weaponKind;
    }

    /**
     * @param mixed $weaponKind
     */
    public function setWeaponKind($weaponKind): void
    {
        $this->weaponKind = $weaponKind;
    }

    /**
     * @return mixed $particularity
     */
    public function getParticularities()
    {
        return $this->particularities;
    }

    public function addParticularities(StuffParticularity $particularity)
    {
        if (!$this->particularities->contains($particularity)) {
            $this->particularities->add($particularity);
        }

        return $this;
    }

    public function removeParticularities(StuffParticularity $particularity)
    {
        if ($this->particularities->contains($particularity)) {
            $this->particularities->removeElement($particularity);
        }

        return $this;
    }
}
