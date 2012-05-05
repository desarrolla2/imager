<?php

namespace Desarrolla2\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Desarrolla2\FrontendBundle\Form\Type\SearchType;

class SearchController extends Controller
{

    /**
     * @Route("/s")
     * @Template()
     */
    public function indexAction()
    {
        $client = $this->get('flickr_client');
        $client->search();

        $collection = $this->get('image_collection');
        $collection->sort();
        return array('images' => $collection->toArray());
    }

}

