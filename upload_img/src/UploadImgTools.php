<?php
/**
 * Created by PhpStorm.
 * User: AzaZelLo
 * Date: 28.09.2016
 * Time: 14:04
 */

namespace lishchenko\upload_img\src;


class UploadImgTools
{
    private $extension_list = ['jpg', 'png', 'gif'];

    public function checkUrlIsImg($imgUrl)
    {
        $len = strrpos($imgUrl, '.');
        $extension = substr($imgUrl, $len + 1);
        $res = in_array($extension, $this->extension_list);

        return $res;
    }

    public function checkDirectory($file_name)
    {
        $len = strrpos($file_name, '/');
        if ($len === false) {
            $len = strrpos($file_name, '\\');
        }
        $directory = substr($file_name, 0, $len + 1);

        if (!is_dir($directory)) {
            $res = mkdir($directory);
            return $res;
        }

        return true;
    }

    public function checkMimetype($file_name)
    {
        $mimetype = mime_content_type($file_name);
        $extension = str_replace('image/', '', $mimetype);
        $res = in_array($extension, $this->extension_list);

        return $res;
    }

}