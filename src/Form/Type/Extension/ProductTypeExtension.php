<?php

declare(strict_types=1);

namespace App\Form\Type\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $colorChoices = [
            'Red' => 'Red',
            'Green' => 'Green',
            'Blue' => 'Blue',
        ];

        $builder->add('color', ChoiceType::class, [
            'label' => 'Color',
            'mapped' => false,
            'required' => false,
            'choices' => $colorChoices,
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
