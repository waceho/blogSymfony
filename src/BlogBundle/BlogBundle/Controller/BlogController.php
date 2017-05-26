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
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BlogBundleBlogBundle:Blog')->find($id);

        if (!$blog) {
        throw $this->createNotFoundException('no find Blog post.');
    }

    $comments = $em->getRepository('BlogBundleBlogBundle:Comment')
                   ->getCommentsForBlog($blog->getId());

    return $this->render('BlogBundleBlogBundle:Blog:show.html.twig', array(
        'blog'      => $blog,
        'comments'  => $comments
    ));
        
    }
}