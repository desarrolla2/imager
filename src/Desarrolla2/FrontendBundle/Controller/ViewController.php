<?php

/*
 * This file is part of the Imager package.
 * 
 * Short description   
 *
 * @author Daniel González <daniel.gonzalez@freelancemadrid.es>
 * @date May 18, 2012, 7:13:41 PM
 * @file ViewController.php , UTF-8
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Desarrolla2\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Desarrolla2\FrontendBundle\Form\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewController extends Controller
{

    /**
     * @Route("/v/{provider}/{hash}/{description}", name="view", 
     * requirements={ "provider" = "[\w]+", "hash" = "[\w\d]+", "description" = "[\w\d\-]+" }, 
     * defaults={ "provider" = "" ,"hash" = "", "description" = ""})
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new SearchType());

        $client = $this->get('flickr.search');
        $image = $client->get($request->get('hash'));

        $response = $this->render('FrontendBundle:View:index.html.twig', array(
            'image' => $image,
            'form'  => $form->createView(),
                ));

        $response->setCache(array(
            'public'   => true,
            's_maxage' => $this->container->getParameter('cache_expires_view')
        ));

        return $response;
    }

}

