<?php

namespace Study\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Study\BlogBundle\Entity\Post;
use Study\BlogBundle\Form\Type\PostType;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function indexAction()
    {
		$repository = $this->getDoctrine()
				->getRepository('StudyBlogBundle:Post');
		$posts = $repository->findAll();
		echo '<pre>';
		\Doctrine\Common\Util\Debug::dump($posts);
		echo '</pre>';
        return $this->render('StudyBlogBundle:Post:index.html.twig', array(
			'posts'	=> $posts,
		));
    }
	
	public function createAction(Request $request)
	{
		$oPost = new Post();
		$form = $this->createForm(new PostType(), $oPost);
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($oPost);
			$em->flush();

			return $this->redirect($this->generateUrl('study_home_post'));
		}

		return $this->render('StudyBlogBundle:Post:add.html.twig', array(
            'form' => $form->createView(),
        ));
	}
	
	public function editAction($id, Request $request)
	{
		$repository = $this->getDoctrine()
				->getRepository('StudyBlogBundle:Post');
		$oPost = $repository->find($id);
		if (!$oPost) {
			throw $this->createNotFoundException(
					'No product found for id ' . $id
			);
		}
		
		$form = $this->createForm(new PostType(), $oPost);
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->flush();

			return $this->redirect($this->generateUrl('study_home_post'));
		}
		
		return $this->render('StudyBlogBundle:Default:edit.html.twig',array(
			'form'  => 	$form->createView()
		));
	}
	
	public function deleteAction($id)
	{
		$repository = $this->getDoctrine()
				->getRepository('StudyBlogBundle:Post');
		$oPost = $repository->find($id);
		if(!$oPost) {
			throw $this->createNotFoundException(
					"No product found for id " . $id
			);
		}
		
		$em = $this->getDoctrine()->getManager();
		$em->remove($oPost);
		$em->flush();
		
		return $this->redirect($this->generateUrl('study_home_post'));
	}
}
