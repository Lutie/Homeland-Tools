<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class StuffParticularity
{

    use IdTrait;

    use NameTrait;

    use DescriptionTrait;

}