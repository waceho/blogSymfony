<?php

namespace BlogBundle\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // index
        return $this->render('MyPage/index.html.twig');
    }

    /**
     * @Route("about/", name="about")
     */
    public function aboutAction(Request $request)
    {
        // contact
        return $this->render('MyPage/about.html.twig');
    }
    
    /**
     * @Route("contact/", name="contact")
     */
    public function contactAction(Request $request)
    {
        // contact
        return $this->render('MyPage/contact.html.twig');
    }

    
}
