<?php

namespace App\Form;

use Doctrine\ORM\EntityRepository;
use App\Entity\Answer;
use App\Entity\Question;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {  

        
        $builder
        ->add('answer_text', TextType::class, [
            'label' => 'Réponse'
        ])
        ->add('is_correct', CheckboxType::class, [
            'label' => 'Correct',
            'required' => false
        ])
        
        ->add('question', EntityType::class, [
            'class' => Question::class,
            'choice_label' => 'question_text', 
            'placeholder' => 'Sélectionnez une question',
            'choice_attr' => function($choice, $key, $value) {
                return ['data-quiz-id' => $choice->getQuiz()->getId()];
            },
        ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Answer::class,
        ]);
    }
}
