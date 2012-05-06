<?php

namespace Desarrolla2\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Desarrolla2\FrontendBundle\Form\Type\SearchType;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $form = $this->createForm(new SearchType());

        $response = $this->render('FrontendBundle:Default:index.html.twig', array(
            'form' => $form
                ));

        $response->setCache(array(
            'public'   => true,
            's_maxage' => $this->container->getParameter('cache_expires')
        ));
        return $response;
    }

}

