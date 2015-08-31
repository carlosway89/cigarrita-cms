<?php 
  $config=Configuration::model()->find();
  $criteria = new CDbCriteria;
  $criteria->condition="language = '$config->language' and state=1 AND is_deleted=0";
  $criteria->limit = 1000;

  $menu=Menu::model()->findAll($criteria);

  $theme=Yii::app()->theme->baseUrl;
  $request=Yii::app()->request->baseUrl;
?>
<!DOCTYPE html>
<html ng-app="cigarritaWeb">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$config->title?></title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta name="description" content="<?=$config->description?>"/>
    <meta name="author" lang="en" content="Cigarrita Worker"/>
    <meta name="keywords" content="<?=$config->keywords?>"/>
    <meta name="robots" content="INDEX,FOLLOW">

    

	<link rel="stylesheet" type="text/css" href="<?php echo $theme; ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $theme; ?>/css/semantic.min.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo $theme; ?>/css/style.css">
	
	<!--[Cigarrita Styles]-->
    <?php include($request."assets/css_editor.php"); ?>
    <!--[/End Styles]-->

	<script type="text/javascript" src="<?php echo $theme; ?>/js/jquery-2.1.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $theme; ?>/js/webfont.js"></script> 
	<script type="text/javascript" src="<?php echo $theme; ?>/js/bootstrap.min.js"></script>	
	<!--<script type="text/javascript" src="<?php echo $theme; ?>/js/semantic.js"></script>	-->
	<script type="text/javascript" src="<?php echo $theme; ?>/js/outsider.js"></script>

	
	<!--[Cigarrita Angular Path]-->	
	<?php include($request."assets/js_editor.php"); ?>
	<!--[/cigarrita Angular Path]-->


	

	
</head>
<body>

	<div id="external_links"></div>
	<div class="header fast-animated clearfix" ng-controller="indexCtrl">
		<div class="line ui page grid page-gray" style="background-color:#F5F5F5">
			<div class="column">
				<div class="ui search selection dropdown pull-right"  language-select="language">
					<input id="language_option" name="language" type="hidden" value="{{current}}">					
					<div class="default text">Select Language </div>
					<i class="dropdown icon"></i>
					<div class="menu laguage-select" style="z-index: 1000;" >
						<!--Languages Availables-->
					</div>
				</div>

			</div>
		</div>
		<div >
			<div id="navegador" data-spy="affix"  data-offset-top="100" role="navigation" class="menu ui page grid menu-header">
				
				<div class="ui horizontal list pull-left" style="margin-top: -20px;">
					<a class="item">
				  		<h1 class="logo">Cigarrita <small>Worker</small></h1>
				  	</a>
				</div>
				<div class="ui secondary pull-right menu">
				  <a href="javascript:;;" class="menu-side-icon"><i class="align justify icon"></i></a>
				  <div class=" menu header-options">
					<!--menus -->
					<!--use target="_self" to -->
					<a class='item' ng-href='{{link.url}}' ng-repeat="link in links" menu-links="{{link.type}}">{{link.name}}</a>
				</div>

			</div>
		</div>
	</div>
	<div class="content" >
		<div ng-view></div>	
	</div>
	
</body>
</html>
