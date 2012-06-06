<?php

namespace Desarrolla2\FrontendBundle\Service;

use Desarrolla2\FrontendBundle\Collections\Image;
use Desarrolla2\FrontendBundle\Collections\ImageCollection;

class FlickrSearchService
{

    private $apiKey = '45dc17593786130089e3ca524724da6c';
    private $collection = null;
    private $options;

    public function __construct(ImageCollection $collection)
    {
        $this->collection = $collection;
        $this->options = array('per_page' => 50, 'format'   => 'php_serial');
    }

    public function search($query = null)
    {
        if ($query) {
            $search = 'http://flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $this->apiKey . '&text=' . urlencode($query) . '&per_page=68&format=php_serial';
        } else {
            $search = 'http://flickr.com/services/rest/?method=flickr.photos.getRecent&api_key=' . $this->apiKey . '&per_page=68&format=php_serial';
        }
        $result = unserialize(file_get_contents($search));
        foreach ($result['photos']['photo'] as $photo) {
            $image = new Image($photo);
            $image->setUrl('http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg');
            $image->setProvider('flickr');
            $this->collection->add($image);
        }

        return $this->collection;
    }

    public function get($query)
    {
        $search = 'http://flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=' . $this->apiKey . '&photo_id=' . urlencode($query) . '&format=php_serial';
        $result = unserialize(file_get_contents($search));
        $photo = $result['photo'];
        $image = new Image($result['photo']);
        $image->setUrl('http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg');
        $image->setProvider('flickr');
        $image->setName($photo['title']['_content']);
        $image->setDescription($photo['description']['_content']);
        $image->setOwner($photo['owner']['realname']);
        return $image;
    }

}