<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Produit;
use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prix')
            ->add('description')
            ->add('photo',FileType::class , [
                'label'=> false,
                'multiple'=>true,
                'mapped'=> false,
                'required'=>false])
            ->add('fiche')
            ->add('categorie',EntityType::class,[
                'class'=>Categorie::class,
                'label'=>'categorie',
                'required'=>false,
                'choice_label' => 'nomC'
            ])

             ->add('Ajouter',SubmitType::class)


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}