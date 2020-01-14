<?php

namespace App\Form;

use App\Entity\Note;
use App\Entity\Matiere;
use App\Entity\Etudiant;
use App\Entity\Semestre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note')
            ->add('matiere' ,EntityType::class,[
                'class' => Matiere::class,
                'choice_label' => 'designMatiere'
            ])
            ->add('etudiant',EntityType::class,[
                'class' => Etudiant::class,
                'choice_label' => 'nom'
            ])
            ->add('semestre' ,EntityType::class,[
                'class' => Semestre::class,
                'choice_label' => 'designSemestre'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }
}
