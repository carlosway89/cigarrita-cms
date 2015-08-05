<?php

$yii=dirname(__FILE__).'/yii/framework/yii.php';

$config=dirname(__FILE__).'/protected/config/main.php';

defined('YII_DEBUG') or define('YII_DEBUG',true);
// including Yii
require_once($yii);

// creating and running console application
Yii::createConsoleApplication($config)->run();
