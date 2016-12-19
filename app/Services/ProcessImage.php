<?php
/**
 * Created by PhpStorm.
 * User: mozart
 * Date: 11/3/16
 * Time: 10:14 PM
 */

namespace App\Services;

use Image;
use Faker\Factory as Faker;

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

    public function saveProfile($file, $path="images/profileimages/")
    {
        $filename = $this->renameBase64($file);
        Image::make($file)->save($path.$filename);
        return $path.$filename;
    }

    public function saveProfileAjax($data, $path="images/profileimages/"){
        $filename = $this->renameBase64();


        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);

        file_put_contents($path.$filename.'.png', $data);
        return $path.$filename.'.png';
    }


    public function saveStatus($file, $path="images/status/"){
        $filename = $this->rename($file);
        Image::make($file)->save($path.$filename);
        return $path.$filename;
    }

    public function saveCoverAjax($data, $path="images/cover/"){
      $filename = $this->renameBase64();

      list($type, $data) = explode(';', $data);
      list(, $data)      = explode(',', $data);
      $data = base64_decode($data);

      file_put_contents($path.$filename.'.png', $data);
      return $path.$filename.'.png';
    }

    public function getExtension($file){
        return exif_imagetype($file);
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

    public function renameBase64(){


        $faker = Faker::create();

        return $faker->sha1;

    }
}
