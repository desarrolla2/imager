<?php

/*
 * This file is part of the Replicus package.
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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Desarrolla2\FrontendBundle\Form\Type\SearchType;

class SearchController extends Controller
{

    /**
     * @Route("/", name="search")
     */
    public function indexAction(Request $request)
    {
        if (is_null($request->get('s'))) {
            $httpKernel = $this->container->get('http_kernel');
            return $httpKernel->forward('FrontendBundle:Default:index');
        }
        $form = $this->createForm(new SearchType());
        $form->bindRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
            $this->get('doctrine')->getEntityManager()
                    ->getRepository('FrontendBundle:Query')
                    ->addQuery($data['q']);


            $client = $this->get('flickr.search');
            $collection = $client->search($data['q']);
            $collection->sort();
           
            $response = $this->render('FrontendBundle:Search:index.html.twig', array(
                'query'  => $data['q'],
                'images' => $collection->toArray(),
                'form'   => $form->createView(),
                'description' => $collection->getDescription(),
                    ));

            $response->setCache(array(
                'public'   => true,
                's_maxage' => $this->container->getParameter('cache_expires_search'),
            ));
            return $response;
        } else {
            $errors = $form->get('q')->getErrors();
            $this->get('session')->setFlash('error', $errors[0]->getMessageTemplate());
            return new RedirectResponse($this->generateUrl('home'));
        }
    }

}

