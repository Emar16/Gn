<?php

namespace App\Form;

use App\Entity\Matiere;
use App\Entity\Ue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class MatiereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designMatiere')
            ->add('poids')
            ->add('creditMatiere')
            ->add('ue',EntityType::class,[
                'class' => Ue::class,
                'choice_label' => 'designUe'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Matiere::class,
        ]);
    }
}
