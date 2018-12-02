<?php

namespace PylifeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class PlVentaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('venCreatedAt', DateTimeType::class, array(
				'widget' => 'single_text',
				'html5' => false,
				'attr' => ['class' => 'js-datetimepicker'],
			))
			->add('venUpdatedAt', DateTimeType::class, array(
				'widget' => 'single_text',
				'html5' => false,
				'attr' => ['class' => 'js-datetimepicker'],
				'required'   => false,
			))
			->add('venActive')
			->add('venPa')
			->add('venUsr')
			->add('venUsrCreatedBy')
			->add('venUsrUpdatedBy')
;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PylifeBundle\Entity\PlVenta'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pylifebundle_plventa';
    }


}
