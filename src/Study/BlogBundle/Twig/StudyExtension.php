<?php

// src/Study/BlogBundle/Twig/StudyExtension.php
namespace Study\BlogBundle\Twig;

class StudyExtension extends \Twig_Extension
{
	public function getFilters() {
		return array(
			new \Twig_SimpleFilter('in_array', array($this, 'inarrayFilter')),
		);
	}
	
	public function inarrayFilter($value, array $array, $strict = false) {
		in_array($value, $array, $strict);
	}
	
	public function getFunctions() {
		return array(
			new \Twig_SimpleFunction('in_array_f', array($this, 'inarrayFunction')),
		);
	}
	
	public function inarrayFunction($value, array $array, $strict = false) {
		if(in_array($value, $array, $strict))
			return "Input in array";
		else
			return "Input not in array";
	}

	public function getName() {
		return 'study_extension';
	}
}