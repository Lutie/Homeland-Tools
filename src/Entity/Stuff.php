<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="stuff")
 */
class Stuff
{

    use IdTrait;

    use NameTrait;

    use DescriptionTrait;

    /**
     * @ORM\ManyToOne(targetEntity="StuffType", inversedBy="stuff")
     */
    private $type;

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
     * @ORM\Column(type="integer", length=5)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -1, max = 1 )
     * Note : -1 for no metal stuff, 0 for hybrid stuff, 1 for full metal stuff
     */
    private $shape = 0;

    /**
     * @ORM\ManyToOne(targetEntity="StuffFamily", inversedBy="stuff")
     * @ORM\JoinColumn(nullable=true)
     */
    private $family;

    /**
     * @ORM\ManyToMany(targetEntity="StuffParticularity")
     * @ORM\JoinColumn(nullable=true)
     */
    private $particularities;

    /**
     * @ORM\OneToMany(targetEntity="FullStuff", mappedBy="stuff")
     * @ORM\JoinColumn(nullable=true)
     */
    private $fullStuff;

    /**
     * @ORM\Column(type="boolean")
     */
    private $armorIsAdvanced = false;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $weaponGrip;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $weaponKind;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize = "1m", mimeTypes={ "image/jpeg", "image/png" })
     */
    private $img;

    public function __construct()
    {
        $this->particularities = new ArrayCollection();
        $this->fullStuff = new ArrayCollection();
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

    /**
     * @return mixed
     */
    public function getShape()
    {
        return $this->shape;
    }

    /**
     * @param mixed $shape
     */
    public function setShape($shape): void
    {
        $this->shape = $shape;
    }

    /**
     * @return mixed
     */
    public function getArmorIsAdvanced()
    {
        return $this->armorIsAdvanced;
    }

    /**
     * @param mixed $armorIsAdvanced
     */
    public function setArmorIsAdvanced($armorIsAdvanced): void
    {
        $this->armorIsAdvanced = $armorIsAdvanced;
    }

    /**
     * @return mixed $fullStuff
     */
    public function getFullStuff()
    {
        return $this->particularities;
    }

    public function addFullStuff(FullStuff $fullStuff)
    {
        if (!$this->fullStuff->contains($fullStuff)) {
            $this->fullStuff->add($fullStuff);
        }

        return $this;
    }

    public function removeFullStuff(FullStuff $fullStuff)
    {
        if ($this->fullStuff->contains($fullStuff)) {
            $this->fullStuff->removeElement($fullStuff);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg($img): void
    {
        $this->img = $img;
    }

}
