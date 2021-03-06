<?php

namespace Study\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Study\BlogBundle\Entity\Blog;
use Study\BlogBundle\Form\Type\BlogType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
		$repository = $this->getDoctrine()
				->getRepository('StudyBlogBundle:Blog');
		$blogs = $repository->findAll();
		//var_dump($blogs);
        return $this->render('StudyBlogBundle:Default:index.html.twig', array(
			'blogs'	=> $blogs
		));
    }
	
	public function createAction(Request $request)
	{
		$oBlog = new Blog();
		$form = $this->createForm(new BlogType(), $oBlog);
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($oBlog);
			$em->flush();

			return $this->redirect($this->generateUrl('study_home_blog'));
		}

		return $this->render('StudyBlogBundle:Default:add.html.twig', array(
            'form' => $form->createView(),
        ));
	}
	
	public function editAction($id, Request $request)
	{
		$repository = $this->getDoctrine()
				->getRepository('StudyBlogBundle:Blog');
		$oBlog = $repository->find($id);
		if (!$oBlog) {
			throw $this->createNotFoundException(
					'No product found for id ' . $id
			);
		}
		
		$form = $this->createForm(new BlogType(), $oBlog);
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->flush();

			return $this->redirect($this->generateUrl('study_home_blog'));
		}
		
		return $this->render('StudyBlogBundle:Default:edit.html.twig',array(
			'form'  => 	$form->createView()
		));
	}
	
	public function deleteAction($id)
	{
		$repository = $this->getDoctrine()
				->getRepository('StudyBlogBundle:Blog');
		$oBlog = $repository->find($id);
		if(!$oBlog) {
			throw $this->createNotFoundException(
					"No product found for id" . $id
			);
		}
		
		$em = $this->getDoctrine()->getManager();
		$em->remove($oBlog);
		$em->flush();
		
		return $this->redirect($this->generateUrl('study_home_blog'));
	}
}
