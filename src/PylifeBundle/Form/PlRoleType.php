<?php

namespace PylifeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlRoleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('rolNombre')
->add('rolCreatedAt')
->add('rolUpdatedAt')
->add('rolActive')
->add('rolUsrCreatedBy')
->add('rolUsrUpdatedBy')
;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PylifeBundle\Entity\PlRole'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pylifebundle_plrole';
    }


}
