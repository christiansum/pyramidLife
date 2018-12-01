<?php

namespace PylifeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlInventarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('invCantidad')->add('invFechaVencimiento')->add('invCreatedAt')->add('invUpdatedAt')->add('invActive')->add('invPro')->add('invUsrCreatedBy')->add('invUsrUpdatedBy');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PylifeBundle\Entity\PlInventario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pylifebundle_plinventario';
    }


}
