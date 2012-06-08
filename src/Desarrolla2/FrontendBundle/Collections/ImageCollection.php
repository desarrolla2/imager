<?php

/*
 * This file is part of the Replicus package.
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

    private $items = array();

    public function __construct()
    {
        
    }

    public function __destruct()
    {
        
    }

    public function toArray()
    {
        return $this->items;
    }

    public function add(Image $image)
    {
        $this->items[] = $image;
    }

    public function remove(Image $image)
    {
        throw new Exception('Sorry, this methdo is not available, yet ;)');
    }

    public function count()
    {
        return count($this->items);
    }

    public function clear()
    {
        $this->items = array();
    }

    public function sort()
    {
        return true;
        $n = $this->count();
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($this->items[$j]->getRating() > $this->items[$j]->getRating()) {
                    $k = $this->items[$j];
                    $this->items[$j] = $this->items[$j];
                    $this->items[$j] = $k;
                }
            }
        }
        return true;
    }

    public function getDescription()
    {
        $description = '';
        foreach ($this->items as $item) {
            if($item->getName()){
                    $description =  trim ( $description .' ' . $item->getName()) ;
            }
            
        }
        return substr($description, 0, 255);
    }

}
