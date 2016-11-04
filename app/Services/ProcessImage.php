<?php
/**
 * Created by PhpStorm.
 * User: mozart
 * Date: 11/3/16
 * Time: 10:14 PM
 */

namespace App\Services;

use Image;

class ProcessImage
{
    /*
    |----------------------------------------------------------
    | Image Processing Class
    |----------------------------------------------------------
    |
    | The Function of this class is to process the images and
    | save them with little or no hassles, Joseph is going
    | to be really shocked about this when he see's it
    | am a boss. The guy in the code, that sounds
    | cool. yea..
    |
    */

    public function saveProfile($file, $path="images/profileimages/", $width, $height)
    {
        $filename = $this->rename($file);
        Image::make($file)->resize($width, $height)->save($path.$filename);
        return $path.$filename;
    }


    public function saveStatus($file, $path="images/status/"){
        $filename = $this->rename($file);
        Image::make($file)->save($path.$filename);
        return $path.$filename;
    }

    public function saveCoverPic($file, $path="images/status/",$width,$height){
        $filename = $this->rename($file);
        Image::make($file)->resize($width, $height)->save($path.$filename);
        return $path.$filename;
    }

    public function getExtension($file){
        return Image::make($file)->mime();
    }

    

    public function rename($file)
    {
        $faker = Faker::create();
        switch(exif_imagetype($file))
        {
            case IMAGETYPE_GIF : return $faker->sha1.'.gif';
                break;
            case IMAGETYPE_JPEG : return $faker->sha1.'.jpg';
                break;
            case IMAGETYPE_PNG : return $faker->sha1.'.png';
                break;
            case IMAGETYPE_BMP : return $faker->sha1.'.bmp';
        }

    }
}