<?php

namespace PylifeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class PlRoleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('rolNombre')
			->add('rolCreatedAt', DateTimeType::class, array(
				'widget' => 'single_text',
				'html5' => false,
				'attr' => ['class' => 'js-datetimepicker'],
			))
			->add('rolUpdatedAt', DateTimeType::class, array(
				'widget' => 'single_text',
				'html5' => false,
				'attr' => ['class' => 'js-datetimepicker'],
				'required'   => false,
			))
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
