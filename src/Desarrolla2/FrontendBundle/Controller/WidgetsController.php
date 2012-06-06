<?php

/*
 * This file is part of the Imager package.
 * 
 * Short description   
 *
 * @author Daniel González <daniel.gonzalez@freelancemadrid.es>
 * @date May 10, 2012, 12:15:36 AM
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
    public function latestQueriesAction(Request $request)
    {
        return array(
            'title'   => 'Latest Queries',
            'queries' => $this->get('doctrine')
                    ->getEntityManager()->getRepository('FrontendBundle:Query')
                    ->getLatest(),
            'homepage' => 'http://' . $request->getHttpHost(),
        );
    }

    /**
     * @Template("FrontendBundle:Widgets:queries.html.twig")
     */
    public function mostHitsQueriesAction(Request $request)
    {
        return array(
            'title'   => 'Most Hits Queries',
            'queries' => $this->get('doctrine')
                    ->getEntityManager()->getRepository('FrontendBundle:Query')
                    ->getMostHits(),
            'homepage' => 'http://' . $request->getHttpHost(),
        );
    }

    /**
     * @Template("FrontendBundle:Widgets:date.html.twig")
     */
    public function dateAction(Request $request)
    {
        return array(
            'date' => date('d/m/Y H:m:i'),
        );
    }

}
