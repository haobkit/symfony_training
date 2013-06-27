<?php
// src/Study/BlogBundle/Form/Type
namespace Study\BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('username');
		$builder->add('password', 'repeated', array(
			'type' => 'password',
			'invalid_message' => 'The password fields must match.',
			'options' => array('attr' => array('class' => 'password-field')),
			'required' => true,
			'first_options' => array('label' => 'Password'),
			'second_options' => array('label' => 'Repeat Password'),
		));
		$builder->add('email', 'email');
		$builder->add('role', 'choice', array(
			'choices' => array(
				'ROLE_ADMIN' => 'ROLE_ADMIN',
				'ROLE_EDITOR' => 'ROLE_EDITOR',
				'ROLE_USER' => 'ROLE_USER',
			),
		));
		$builder->add('save', 'submit', array(
            'attr'  => array('class' => 'btn btn-success'),
        ));
	}
	
	public function getName()
    {
        return 'user';
    }
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'Study\BlogBundle\Entity\User',
		));
	}
}
