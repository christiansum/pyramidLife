<?php

namespace PylifeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class PlPaisType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('paNombre')
		   ->add('paCodigoArea')
		   ->add('paCreatedAt', DateTimeType::class, array(
			   'widget' => 'single_text',
			   'html5' => false,
			   'attr' => ['class' => 'js-datetimepicker date'],
		   ))
		   ->add('paUpdatedAt', DateTimeType::class, array(
			   'widget' => 'single_text',
			   'html5' => false,
			   'attr' => ['class' => 'js-datetimepicker date'],
			   'required'   => false,
		   ))
		   ->add('paActive')
		   ->add('paUsrCreatedBy')
		   ->add('paUsrUpdatedBy', null, array(
			   'required'   => false,
		   ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PylifeBundle\Entity\PlPais'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pylifebundle_plpais';
    }


}
