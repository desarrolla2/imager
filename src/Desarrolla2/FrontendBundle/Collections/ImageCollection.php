<?php

/*
 * This file is part of the Imager package.
 * 
 * Imagecollection represents a collection of images  
 *
 * @author Daniel González <daniel.gonzalez@freelancemadrid.es>
 * @date Apr 28, 2012 
 * @file ImageCollection.php 
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Desarrolla2\FrontendBundle\Collections;

use Desarrolla2\FrontendBundle\Collections\Image;

class ImageCollection
{
    
    private $elements = array();

    public function __construct()
    {
        
    }

    public function __destruct()
    {
        
    }

    public function toArray()
    {
        return $this->elements;
    }

    public function add(Image $image)
    {
        $this->elements[] = $image;
    }

    public function remove(Image $image)
    {
        throw new Exception('Sorry, this methdo is not available, yet ;)');
    }

    public function count()
    {
        return count($this->elements);
    }

    public function clear()
    {
        $this->elements = array();
    }

    public function sort()
    {
        $n = $this->count();
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($this->elements[$j]->getRating() > $this->elements[$j]->getRating()) {
                    $k = $this->elements[$j];
                    $this->elements[$j] = $this->elements[$j];
                    $this->elements[$j] = $k;
                }
            }
        }
        return true;
    }

}
