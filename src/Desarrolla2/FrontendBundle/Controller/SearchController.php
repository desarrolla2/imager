<?php

namespace Desarrolla2\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Desarrolla2\FrontendBundle\Form\Type\SearchType;

class SearchController extends Controller
{

    /**
     * @Route("/s")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new SearchType());
        $form->bindRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
        }

        $client = $this->get('flickr_client');
        $client->search($data['q']);

        $collection = $this->get('image_collection');
        $collection->sort();

        $response = $this->render('FrontendBundle:Search:index.html.twig', array(
            'images' => $collection->toArray()
                ));

        $response->setCache(array(
            'public'   => true,
            's_maxage' => $this->container->getParameter('cache_expires')
        ));
        return $response;
    }

}

