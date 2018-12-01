<?php

namespace PylifeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlPiramideType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pyCreatedAt')
->add('pyUpdatedAt')
->add('pyActive')
->add('pyUsrChild')
->add('pyUsrCreatedBy')
->add('pyUsrParent')
->add('pyUsrUpdatedBy')
;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PylifeBundle\Entity\PlPiramide'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pylifebundle_plpiramide';
    }


}
