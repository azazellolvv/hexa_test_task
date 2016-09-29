<?php
/**
 * Created by PhpStorm.
 * User: AzaZelLo
 * Date: 27.09.2016
 * Time: 21:17
 */

//namespace upload_img\tests;

use \upload_img\src\classes\UploadImg3;

spl_autoload_register(function ($class_name) {
    var_dump($class_name);
    include $class_name . '.php';
});

$obj  = new UploadImg();
