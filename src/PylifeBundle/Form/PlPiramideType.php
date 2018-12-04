<?php
	
	namespace PylifeBundle\Form;
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
	
	class PlPiramideType extends AbstractType
	{
		/**
		 * {@inheritdoc}
		 */
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
			$builder
				->add('pyCreatedAt', DateTimeType::class, array(
						'widget' => 'single_text',
						'html5' => false,
						'attr' => ['class' => 'js-datetimepicker'],
				))
				->add('pyUpdatedAt', DateTimeType::class, array(
						'widget' => 'single_text',
						'html5' => false,
						'attr' => ['class' => 'js-datetimepicker'],
						'required'   => false,
				))
				->add('pyActive')
				->add('pyUsrChild')
				->add('pyUsrCreatedBy')
				->add('pyUsrParent')
				->add('pyUsrUpdatedBy')
			;
		}
		/**
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
