<?php
// src/Study/BlogBundle/Form/Type
namespace Study\BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class PostType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('title');	
		$builder->add('blog','entity',array(
			'class'	=> 'StudyBlogBundle:Blog',
			'property'	=>	'title',
            'query_builder' => function(EntityRepository $er)
            {
                return $er->createQueryBuilder('u')
                    ->orderBy('u.title', 'ASC');
            },
            'empty_value' => 'Choose an option',
		));
		$builder->add('shortDescription', 'textarea');
		$builder->add('fullDescription', 'ckeditor');
		$builder->add('viewed', 'integer');
		$builder->add('file','file');
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
