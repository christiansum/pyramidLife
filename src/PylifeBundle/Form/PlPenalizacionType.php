<?php

namespace PylifeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class PlPenalizacionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('pnaTiempoInicio')
			->add('pnaTiempoFin')
			->add('pnaCreatedAt', DateTimeType::class, array(
				'widget' => 'single_text',
				'html5' => false,
				'attr' => ['class' => 'js-datetimepicker'],
			))
			->add('pnaUpdatedAt', DateTimeType::class, array(
				'widget' => 'single_text',
				'html5' => false,
				'attr' => ['class' => 'js-datetimepicker'],
				'required'   => false,
			))
			->add('pnaActive')
			->add('pnaPti')
			->add('pnaUsr')
			->add('pnaUsrCreatedBy')
			->add('pnaUsrUpdatedBy')
;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PylifeBundle\Entity\PlPenalizacion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pylifebundle_plpenalizacion';
    }


}
