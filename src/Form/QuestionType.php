<?php

namespace App\Form;

use App\Entity\Evaluation;
use App\Entity\Question;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('textQu' , TextType::class , ['attr' => array('class'=>'form-control')])
            ->add('choix1',TextType::class , ['attr' => array('class'=>'form-control')])
            ->add('choix2',TextType::class , ['attr' => array('class'=>'form-control')])
            ->add('choix3',TextType::class , ['attr' => array('class'=>'form-control')])
            ->add('choix4',TextType::class , ['attr' => array('class'=>'form-control')])
            ->add('repCorr',TextType::class , ['attr' => array('class'=>'form-control')])
            ->add('evaluation',EntityType::class ,  ['label'=>'Evaluation',
                'class' => 'App\Entity\Evaluation',
                'choice_label'=>'evalNom',
                'attr' => array('class'=>'form-control')])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
