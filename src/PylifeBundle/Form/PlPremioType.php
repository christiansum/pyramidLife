<?php

namespace PylifeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class PlPremioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('preNombre')
			->add('preCreatedAt', DateTimeType::class, array(
				'widget' => 'single_text',
				'html5' => false,
				'attr' => ['class' => 'js-datetimepicker'],
			))
			->add('preUpdatedAt', DateTimeType::class, array(
				'widget' => 'single_text',
				'html5' => false,
				'attr' => ['class' => 'js-datetimepicker'],
				'required'   => false,
			))
			->add('preActive')
			->add('prePa')
			->add('preUsrCreatedBy')
			->add('preUsrUpdatedBy');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PylifeBundle\Entity\PlPremio'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pylifebundle_plpremio';
    }


}
