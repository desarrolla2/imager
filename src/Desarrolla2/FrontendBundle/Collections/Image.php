<?php

/*
 * This file is part of the Imager package.
 * 
 * Image represent a image object
 *
 * @author Daniel González <daniel.gonzalez@freelancemadrid.es>
 * @date Apr 27, 2012 
 * @file Image.php 
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Desarrolla2\FrontendBundle\Collections;

class Image
{

    /**
     * Image name
     * @var string      
     */
    private $name = null;
    private $rating = 0;
    private $url = null;
    private $provider = null;
    private $owner = null;
    private $description = null;
    private $license = null;

    /**
     * Settings parametters by construct options
     * @param array $options 
     */
    public function __construct($options = array())
    {
        if (isset($options['name'])) {
            $this->setName($options['name']);
        }
        if (isset($options['title'])) {
            $this->setName($options['title']);
        }
    }

    /**
     * retrieve image name
     * 
     * @return string $name 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * set image name
     * @param string $name 
     */
    public function setName($name = null)
    {
        if ($name) {
            $this->name = (string) $name;
        }
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating = null)
    {
        if ($rating) {
            $this->rating = (float) $rating;
        }
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url = null)
    {
        if ($url) {
            $this->url = (string) $url;
        }
    }

    public function getBase64Url()
    {
        return base64_encode($this->url);
    }

    public function getProvider()
    {
        return $this->provider;
    }

    public function setProvider($provider = null)
    {
        if ($provider) {
            $this->provider = (string) $provider;
        }
    }

}
