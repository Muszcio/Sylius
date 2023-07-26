<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Core\Model\ProductInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="sylius_product")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap("ExtendedProduct" = "Product")
 */
class ExtendedProduct extends BaseProduct implements ProductInterface
{
    /**@ORM\Column(type="string", nullable=true) */
    private $color;


    public function getColor()
    {
        return $this->color;
    }


    public function setColor($color): void
    {
        $this->color = $color;
    }



}
