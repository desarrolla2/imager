<?php

/*
 * This file is part of the Imager package.
 * 
 * Short description   
 *
 * @author Daniel González <daniel.gonzalez@freelancemadrid.es>
 * @date Jun 10, 2012, 11:52:08 PM
 * @file Utils.php , UTF-8
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Desarrolla2\FrontendBundle\Utils;

class Utils
{

    static public function slugify($text, $spacing = false, $space_char = '-', $empty_value = 'n-a')
    {
        $text = trim(strtolower($text));
        $text = str_replace('á', 'a', $text);
        $text = str_replace('é', 'e', $text);
        $text = str_replace('í', 'i', $text);
        $text = str_replace('ó', 'o', $text);
        $text = str_replace('ú', 'u', $text);
        $text = str_replace('ü', 'u', $text);
        $text = str_replace('ñ', 'n', $text);
        if ($spacing) {
            $text = preg_replace('/^(\w\s)/', $space_char, $text);
        } else {
            $text = preg_replace('/\W+/', $space_char, $text);
        }
        if (empty($text)) {
            return $empty_value;
        }
        return $text;
    }

}
