<?php

require_once ('vendor/phpthumb/lib/phpThumb/src/ThumbLib.inc.php');

class PhpthumbCW
{

  public function saveImage($original_path,$new_path,$parameters=array()){
    try
    {

      $_quality=isset($parameters["quality"])?$parameters["quality"]:90;
      $_width=isset($parameters["width"])?$parameters["width"]:1000;
      $_height=isset($parameters["height"])?$parameters["height"]:1000;
      $_crop=isset($parameters["crop"])?$parameters["crop"]:0;

      $options = array 
      (
        'jpegQuality'     => $_quality
      );
      
      $thumb = PhpThumbFactory::create($original_path);
      $thumb->setOptions($options);

      if ($_crop==1) {
        $thumb->adaptiveResize($_width,$_height);
      }else{
        $thumb->resize($_width,$_height);
      }
  
      $thumb->save($new_path);

    }
    catch (Exception $e)
    {
      if (! YII_DEBUG ) {
        $thumb = PhpThumbFactory::create("assets/editor/images/default-image.jpg");
        $thumb->save($new_path);
      }else{
        print_r($e);
      }     

    }

  }

  public function showImage($url,$parameters=array()){

    try
    {


      $options = array 
      (

        'jpegQuality'     => $parameters["quality"]
      );
      
      $thumb = PhpThumbFactory::create($url);
      $thumb->setOptions($options);

      // $thumb->cropFromCenter(1000,100);
      if ($parameters["crop"]==1) {
        $thumb->adaptiveResize($parameters["width"],$parameters["height"]);
      }else{
        $thumb->resize($parameters["width"],$parameters["height"]);
      }
      
      
      //$thumb->resizePercent(10);
      // $thumb->resizePercent(50);
      $thumb->show();
  
      //$thumb->save($cache_path);

    }
    catch (Exception $e)
    {
      if (! YII_DEBUG ) {
        //show default image
        $thumb = PhpThumbFactory::create("assets/editor/images/default-image.jpg");
        $thumb->show();
      }else{
        print_r($e);
      } 
      
      
    }
   
  }



}