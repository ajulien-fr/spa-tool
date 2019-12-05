<?php

namespace App\Form;

use App\Entity\Action;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ActionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('type', ChoiceType::class, [
            'label_attr' => ['class' => 'col-md-3 text-center col-form-label'],
            'attr' => ['class' => 'form-control'],
            'choices' => [
                '' => '',
                'capture'       => 'capture',
                'abandon'       => 'abandon',
                'relachage'     => 'relachage',
                'adoption'      => 'adoption',
                'décès'         => 'décès',
                'soin'          => 'soin',
                'stérilisation' => 'stérilisation',
                'adhésion'      => 'adhésion',
                'subvention'    => 'subvention',
                'donation'      => 'donation',
                'manifestation' => 'manifestation',
                'achat'         => 'achat',
                'vente'         => 'vente'
            ],
        ])
        ->add('date', DateType::class, [
            'widget' => 'single_text'
        ])
        ->add('depense')
        ->add('recette')
        ->add('remarque')
        ->add('contributeur')
        ->add('newContributeurNom', null, ['mapped' => false, 'required' => false])
        ->add('newContributeurAdresse', null, ['mapped' => false, 'required' => false])
        ->add('newContributeurCodePostal', null, ['mapped' => false, 'required' => false])
        ->add('newContributeurVille', null, ['mapped' => false, 'required' => false])
        ->add('newContributeurTelephone', null, ['mapped' => false, 'required' => false])
        ->add('newContributeurEmail', null, ['mapped' => false, 'required' => false])
        ->add('newContributeurRemarque', null, ['mapped' => false, 'required' => false])
        ->add('animal')
        ->add('newAnimalFamille', ChoiceType::class, ['choices' => ['' => '', 'chat' => 'chat', 'chien' => 'chien', 'rongeur' => 'rongeur'], 'mapped' => false, 'required' => false])
        ->add('newAnimalNom', null, ['mapped' => false, 'required' => false])
        ->add('newAnimalGenre', ChoiceType::class, ['choices' => ['' => '', 'mâle' => 'mâle', 'femelle' => 'femelle'], 'mapped' => false, 'required' => false])
        ->add('newAnimalIcad', null, ['mapped' => false, 'required' => false])
        ->add('newAnimalRemarque', null, ['mapped' => false, 'required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Action::class,
        ]);
    }
}
