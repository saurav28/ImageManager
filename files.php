<?php
/**
 * Created by PhpStorm.
 * User: i054564
 * Date: 10/04/18
 * Time: 1:01 PM
 */

//$dir = '/Applications/mampstack-7.1.15-0/apache2/htdocs/ImageManager/uploads'; //directory to pull from
//echo getcwd();
$path    = getcwd() . '/uploads';
$files = array_diff(scandir($path), array('.', '..'));

    foreach ($files as $file) {
        echo $file;
    }