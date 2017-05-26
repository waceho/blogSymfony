<?php
// src/BlogBundle/BlogBundle/Controller/BlogController.php

namespace BlogBundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show the blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('BlogBundleBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('no find Blog post.');
        }

        return $this->render('BlogBundleBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
        ));
    }
}