<?php

namespace Desarrolla2\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Desarrolla2\FrontendBundle\Form\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;

class WidgetsController extends Controller
{

    /**
     * @Template("FrontendBundle:Widgets:search.html.twig")
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(new SearchType());
        $form->bindRequest($request);
        return array('form' => $form->createView());
    }

    /**
     * @Template("FrontendBundle:Widgets:queries.html.twig")
     */
    public function latestQueriesAction()
    {
        return array(
            'title'   => 'Latest Queries',
            'queries' => $this->get('doctrine')
                    ->getEntityManager()->getRepository('FrontendBundle:Query')
                    ->getLatest()
        );
    }

    /**
     * @Template("FrontendBundle:Widgets:queries.html.twig")
     */
    public function mostHitsQueriesAction()
    {
        return array(
            'title'   => 'Most Hits Queries',
            'queries' => $this->get('doctrine')
                    ->getEntityManager()->getRepository('FrontendBundle:Query')
                    ->getMostHits()
        );
    }

    /**
     * @Template("FrontendBundle:Widgets:date.html.twig")
     */
    public function dateAction()
    {
        return array(
            'date' => date('d/m/Y H:m:i'),
        );
    }

}
