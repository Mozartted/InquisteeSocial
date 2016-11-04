<?php
/**
 * Created by PhpStorm.
 * User: mozart
 * Date: 11/3/16
 * Time: 10:14 PM
 */

namespace app\Services;

use Image;

class ProcessImage
{
    /*
    |----------------------------------------------------------
    | Image Processing Class
    |----------------------------------------------------------
    |
    | The Function of this class is to process the images and
    | save them with little or no hassels, Joseph is going
    | to be really shocked about this when he see's it
    | am a boss. The guy in the cpde, that sounds
    | cool. yea..
    |
    */

    public function saveProfile($file, $path="images/profileimages/", $width, $height)
    {
        $filename = $this->rename($file);
        Image::make($file)->resize($width, $height)->save($path.$filename);
        return 'images/profileimages/'.$filename;
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