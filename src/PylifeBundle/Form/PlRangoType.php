<?php

namespace PylifeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlRangoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('raNombre')
->add('raDescuentoMin')
->add('raDescuentoMax')
->add('raPuntosMin')
->add('raPuntosMax')
->add('raCantSupervisores')
->add('raPosicion')
->add('raTiempoConsecutivo')
->add('raTipoTiempo')
->add('raCreatedAt')
->add('raUpdatedAt')
->add('raActive')
->add('raUsrCreatedBy')
->add('raUsrUpdatedBy')
;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PylifeBundle\Entity\PlRango'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pylifebundle_plrango';
    }


}
