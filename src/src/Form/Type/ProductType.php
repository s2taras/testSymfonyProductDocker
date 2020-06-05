<?php


namespace App\Form\Type;


use App\Entity\OptionValue;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('price', NumberType::class, [
                'scale' => 2,
                'required' => true,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('optionValues', EntityType::class, [
                'class' => OptionValue::class,
                'choice_label' => 'value',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Create',
                'attr' => ['class' => 'btn btn-primary'],
            ]);
    }
}