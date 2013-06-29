<?php
// src/Study/BlogBundle/EventListener/AddSlug.php

namespace Study\BlogBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Study\BlogBundle\Entity\Blog;

class AddSlug
{
	public function prePersist(LifecycleEventArgs $args)
	{
		$oentity = $args->getEntity();
		$oentityManager = $args->getEntityManager();
		
		if($oentity instanceof Blog) {
			$oentity->setSlug(preg_replace( '/\s+/', '', strtolower($oentity->getTitle())) . trim(time()));
		}
	}
}
