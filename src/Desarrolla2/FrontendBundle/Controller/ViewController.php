<?php

namespace Desarrolla2\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewController extends Controller
{

    /**
     * @Route("/v/{image}", name="view", requirements={ "image" = "[\w\d\=]+"}, defaults={ "image" = ""})
     */
    public function indexAction(Request $request)
    {
       $image = base64_decode($request->get('image'));       

        $response = $this->render('FrontendBundle:View:index.html.twig', array(
            'image' => $image
                ));       

        $response->setCache(array(
            'public'   => true,
            's_maxage' => $this->container->getParameter('cache_expires')
        ));
        
        return $response;
    }

}

