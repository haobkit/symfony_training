<?php

namespace Study\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Study\BlogBundle\Entity\User;
use Study\BlogBundle\Form\Type\UserType;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function indexAction()
    {
		$repository = $this->getDoctrine()
				->getRepository('StudyBlogBundle:User');
		$oUsers = $repository->findAll();
		//var_dump($blogs);
        return $this->render('StudyBlogBundle:User:index.html.twig', array(
			'users'	=> $oUsers
		));
    }
	
	public function createAction(Request $request)
	{
		$oUser = new User();
		$form = $this->createForm(new UserType(), $oUser);
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($oUser);
			$em->flush();

			return $this->redirect($this->generateUrl('study_home_user'));
		}

		return $this->render('StudyBlogBundle:User:add.html.twig', array(
            'form' => $form->createView(),
        ));
	}
	
	public function editAction($id, Request $request)
	{
		$repository = $this->getDoctrine()
				->getRepository('StudyBlogBundle:User');
		$oUser = $repository->find($id);
		if (!$oUser) {
			throw $this->createNotFoundException(
					'No User found for id ' . $id
			);
		}
		
		$form = $this->createForm(new UserType(), $oUser);
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->flush();

			return $this->redirect($this->generateUrl('study_home_user'));
		}
		
		return $this->render('StudyBlogBundle:User:edit.html.twig',array(
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
		//$em->remove($oBlog);
        $oBlog->setDeleted($deleted = true);
		$em->flush();
		
		return $this->redirect($this->generateUrl('study_home_blog'));
	}
}
