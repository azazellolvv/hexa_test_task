<?php
/**
 * Created by PhpStorm.
 * User: AzaZelLo
 * Date: 28.09.2016
 * Time: 14:03
 */

namespace lishchenko\upload_img\src;

use lishchenko\upload_img\src\UploadImgTools;

//spl_autoload_register(function ($class_name) {
//
//    $class_name = str_replace('\\', '/', $class_name);
//    var_dump($class_name);
//    include $class_name . '.php';
//
//});

class UploadImg
{
    public function __construct($url, $file_name)
    {
        $UploadImgTools = new UploadImgTools();

        if (!$UploadImgTools->checkUrlIsImg($url)) {
            throw new Extception("This url is not an image");
        }
        // check and exception

        if (!$UploadImgTools->checkDirectory($file_name)) {
            throw  new Exception("Error create directory");
        }

        $content = file_get_contents($url);

        file_put_contents($file_name, $content);

        if (!$UploadImgTools->checkMimetype($file_name)) {
            throw new Exception("File type is not jpg, png or gif");
        }

    }
}

//var_dump(stream_get_wrappers());die;

$url = 'https://habrastorage.org/getpro/habr/post_images/96b/62c/18e/96b62c18e8edf6bc45f328123c5c4a4b.png';
$file_name = 'images/img.png';
$main = new UploadImg($url, $file_name);
