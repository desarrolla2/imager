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
use Desarrolla2\FrontendBundle\Form\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new SearchType());

        $response = $this->render('FrontendBundle:Default:index.html.twig', array(
            'form' => $form
                ));

        $response->setCache(array(
            'public'   => true,
            's_maxage' => $this->container->getParameter('cache_expires_home')
        ));
        return $response;
    }

    /**
     * @Route("/sitemap.xml", name="sitemap")
     */
    public function sitemapAction(Request $request)
    {       
        $response = $this->render('FrontendBundle:Default:sitemap.xml.twig', array(
            'queries' => $this->get('doctrine')
                    ->getEntityManager()->getRepository('FrontendBundle:Query')
                    ->getMostHits(),
            'homepage' => 'http://' . $request->getHttpHost(),
                ));
        
         $response->headers->set('Content-Type', 'text/xml; charset=utf-8');

        $response->setCache(array(
            'public'   => true,
            's_maxage' => $this->container->getParameter('cache_expires_home')
        ));
        
        return $response;
    }

}

