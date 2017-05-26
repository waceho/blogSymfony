<?php

namespace BlogBundle\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\BlogBundle\Entity\Enquiry;
use BlogBundle\BlogBundle\Form\EnquiryType;

class PageController extends Controller
{
    public function indexAction()
    {
       // index
        $em = $this->getDoctrine()
                   ->getManager();

        $blogs = $em->createQueryBuilder()
                    ->select('b')
                    ->from('BlogBundleBlogBundle:Blog',  'b')
                    ->addOrderBy('b.created', 'DESC')
                    ->getQuery()
                    ->getResult();

        return $this->render('BlogBundleBlogBundle:MyPage:index.html.twig', array(
            'blogs' => $blogs
        ));
    }
	
    public function aboutAction()
    {
        return $this->render('BlogBundleBlogBundle:MyPage:about.html.twig');
    }
    
   public function contactAction(Request $request)
   {
   
    $enquiry = new Enquiry();
    $form = $this->createForm(EnquiryType::class, $enquiry);

    if ($request->getMethod() == 'POST') {
        $form->bindRequest($request);

        if ($form->isValid()) {
            // Perform some action, such as sending an email

            // Redirect - This is important to prevent users re-posting
            // the form if they refresh the page
            return $this->redirect($this->generateUrl('BlogBundleBlogBundle_contact'));
        }
    }

    return $this->render('BlogBundleBlogBundle:MyPage:contact.html.twig', array(
        'form' => $form->createView()
    ));
    }
    
    public function sidebarAction()
    {
    $em = $this->getDoctrine()
               ->getEntityManager();

    $tags = $em->getRepository('BlogBundleBlogBundle:Blog')
               ->getTags();

    $tagWeights = $em->getRepository('BlogBundleBlogBundle:Blog')
                     ->getTagWeights($tags);

    return $this->render('BlogBundleBlogBundle:MyPage:sidebar.html.twig', array(
        'tags' => $tagWeights
    ));
    }
    
   
}
    
    
