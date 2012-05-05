<?php

namespace Desarrolla2\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Desarrolla2\FrontendBundle\Form\Type\SearchType;

class WidgetsController extends Controller
{

    /**
     * @Template("FrontendBundle:Widgets:search.html.twig")
     */
    public function searchAction()
    {
        $form = $this->createForm(new SearchType());
        return array('form' => $form->createView());
    }

}