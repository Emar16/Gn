<?php

namespace App\Form;

use App\Entity\Ue;
use App\Entity\Niveau;
use App\Entity\Semestre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class UeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designUe')
            ->add('credit')
            ->add('niveau',EntityType::class,[
                'class' => Niveau::class,
                'choice_label' => 'niveau',
            ])
            ->add('semestre',EntityType::class,[
                'class' => Semestre::class,
                'choice_label' => 'designSemestre'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ue::class,
        ]);
    }
}
