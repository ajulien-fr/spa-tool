<?php

namespace App\Form;

use App\Entity\Animal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('famille', ChoiceType::class, ['choices' => ['' => '', 'chat' => 'chat', 'chien' => 'chien', 'rongeur' => 'rongeur']])
            ->add('nom')
            ->add('genre', ChoiceType::class, ['choices' => ['' => '', 'mâle' => 'mâle', 'femelle' => 'femelle']])
            ->add('icad')
            ->add('remarque')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
