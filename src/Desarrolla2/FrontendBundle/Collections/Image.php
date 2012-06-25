<?php

/*
 * This file is part of the Replicus package.
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

use Desarrolla2\FrontendBundle\Utils\Utils;

class Image
{

    /**
     * Image name
     * @var string      
     */
    protected $id = null;
    protected $name = null;
    protected $rating = 0;
    protected $url = null;
    protected $provider = null;
    protected $owner = null;
    protected $description = null;
    protected $license = null;

    /**
     * Settings parametters by construct options
     * @param array $options 
     */
    public function __construct($options = array())
    {
        if (isset($options['id'])) {
            $this->setId($options['id']);
        }
        if (isset($options['name'])) {
            $this->setName($options['name']);
        }
        if (isset($options['title'])) {
            $this->setName($options['title']);
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
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

    public function setOwner($owner = null)
    {
        if ($owner) {
            $this->owner = (string) $owner;
        }
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setDescription($description = null)
    {
        if ($description) {
            $this->description = (string) $description;
        }
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function slug()
    {
        return Utils::slugify($this->getName());
    }

}
