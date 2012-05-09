<?php

namespace Desarrolla2\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Desarrolla2\FrontendBundle\Form\Type\SearchType;
use Desarrolla2\FrontendBundle\Entity\Query;

class SearchController extends Controller
{

    /**
     * @Route("/s", name="search")
     */
    public function indexAction(Request $request)
    {
        $em = $this->get('doctrine')->getEntityManager();
        $form = $this->createForm(new SearchType());
        $form->bindRequest($request);
        $query = new Query();
        if ($form->isValid()) {
            $data = $form->getData();
            $query->setName($data['q']);
            $em->persist($query);
            $em->flush();
        }

        $client = $this->get('flickr_client');
        $client->search($query);

        $collection = $this->get('image_collection');
        $collection->sort();

        $response = $this->render('FrontendBundle:Search:index.html.twig', array(
            'query'  => $query->getName(),
            'images' => $collection->toArray(),
                ));

        $response->setCache(array(
            'public'   => true,
            's_maxage' => $this->container->getParameter('cache_expires')
        ));
        return $response;
    }

}

