<?php

namespace backBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreBureauType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDebut', 'date')
            ->add('dateFin', 'date')
            ->add('status')
            ->add('filoha')
            ->add('filohaMpanampy')
            ->add('mpitanTsoratra')
            ->add('mpitamBola')
            ->add('sokajinAsa')
            ->add('zanaTsampana')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'backBundle\Entity\MembreBureau'
        ));
    }
}
