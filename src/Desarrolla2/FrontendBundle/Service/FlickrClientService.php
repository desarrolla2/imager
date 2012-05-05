<?php

namespace Desarrolla2\FrontendBundle\Service;

use Desarrolla2\FrontendBundle\Collections\Image;
use Desarrolla2\FrontendBundle\Collections\ImageCollection;

class FlickrClientService
{

    private $apiKey = '45dc17593786130089e3ca524724da6c';
    private $collection = null;
    private $options;

    public function __construct(ImageCollection $collection = null)
    {
        if ($collection) {
            $this->collection = $collection;
        }
        else {
            throw new Exception('Required ImageCollection');
        }
        $this->options = array('per_page' => 50, 'format'   => 'php_serial');
    }

    public function search($query = null)
    {
        if ($query) {
            $search = 'http://flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $this->apiKey . '&text=' . urlencode($query) . '&per_page=68&format=php_serial';
        }
        else {
            $search = 'http://flickr.com/services/rest/?method=flickr.photos.getRecent&api_key=' . $this->apiKey . '&per_page=68&format=php_serial';
        }
        $result = unserialize(file_get_contents($search));
        foreach ($result['photos']['photo'] as $photo) {
            $image = new Image($photo);
            $image->setUrl('http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg');
            $image->setProvider('flickr');
            $this->collection->add($image);
        }
    }

}