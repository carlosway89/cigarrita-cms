<?php 
  $config=Configuration::model()->find();
  
  $criteria = new CDbCriteria;
  $criteria->condition="language = '$config->language' and state=1 AND is_deleted=0";
  $criteria->limit = 1000;

  $menu=Menu::model()->findAll($criteria);
  $pages=Page::model()->findAll();

  $theme=Yii::app()->theme->baseUrl;
  $request=Yii::app()->request->baseUrl;
?>