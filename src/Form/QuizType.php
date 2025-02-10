<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Quiz;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Campo Title con design migliorato
            ->add('title', TextType::class, [
                'label' => 'Titre du quiz',
                'attr' => [
                    'class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800',
                    'placeholder' => 'Entrez le titre du quiz...',
                ],
            ])
            // Campo Category con design migliorato
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name', // Mostra il nome invece dell'ID
                'label' => 'Catégorie',
                'placeholder' => 'Sélectionnez une catégorie',
                'attr' => [
                    'class' => 'w-full px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Quiz::class,
        ]);
    }
}
