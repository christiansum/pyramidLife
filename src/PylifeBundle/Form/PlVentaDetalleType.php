<?php

namespace PylifeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlVentaDetalleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('vdCantidadVendida')
			->add('vdSumaPuntos')
			->add('vdSumaMonto')
			->add('vdCreatedAt')
			->add('vdUpdatedAt')
			->add('vdActive')
			->add('vdInv')
			->add('vdUsrCreatedBy')
			->add('vdUsrUpdatedBy')
			->add('vdVen');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PylifeBundle\Entity\PlVentaDetalle'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pylifebundle_plventadetalle';
    }


}
