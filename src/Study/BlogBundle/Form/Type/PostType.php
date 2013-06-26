<?php
// src/Study/BlogBundle/Form/Type
namespace Study\BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('title');	
		$builder->add('blog','entity',array(
			'class'	=> 'StudyBlogBundle:Blog',
			'property'	=>	'title',
		));
		$builder->add('shortDescription', 'textarea');
		$builder->add('fullDescription', 'textarea');
		$builder->add('viewed', 'integer');
		$builder->add('author');
		$builder->add('createdDate', 'datetime');
		$builder->add('updatedDate', 'datetime');
		$builder->add('save', 'submit', array(
            'attr'  => array('class' => 'btn btn-success'),
        ));
	}
	
	public function getName()
    {
        return 'post';
    }
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'Study\BlogBundle\Entity\Post',
		));
	}
}
