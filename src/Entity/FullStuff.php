<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @ORM\Entity()
 * @ORM\Table(name="fullstuff")
 */
class FullStuff extends AbstractController

{
    use IdTrait;

    use NameTrait;

    /**
     * @ORM\Column(type="integer", length=5)
     * @Assert\NotNull()
     * @Assert\Type("integer")
     * @Assert\Range( min = -6, max = 6 )
     */
    private $quality = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Stuff", inversedBy="fullStuff")
     */
    private $stuff;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="fullStuff")
     */
    private $user;

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
    public function getStuff()
    {
        return $this->stuff;
    }

    /**
     * @param mixed $stuff
     */
    public function setStuff($stuff): void
    {
        $this->stuff = $stuff;
    }

}