<?php

require_once ('vendor/phpthumb/lib/phpThumb/src/ThumbLib.inc.php');

class PhpthumbCW
{

  public function saveImage($url,$path_to,$parameters){


  }

  public function showImage($url){

    try
    {
         $thumb = PhpThumbFactory::create($url);
    }
    catch (Exception $e)
    {
         // handle error here however you'd like
    }
    $thumb->resize(200,200);
    // $thumb->resizePercent(50);
    $thumb->show();
  }



}