<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cigarrita Worker - Web Designer & Developer</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta name="description" content="Web Design and Develop we build the best web app, desarrollo y diseño web construimos las mejores web app"/>
    <meta name="author" lang="en" content="Cigarrita Worker"/>
    <meta name="keywords" content="aplication, web, software, internet, design, developer, elance, SEO, remote work "/>
    <meta name="robots" content="INDEX,FOLLOW">

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/flag-icon.min.css">

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/webfont.js"></script> 
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/semantic.js"></script>

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/underscore.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/backbone.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/handlebars.js"></script>
	<script data-main="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/main" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/require.js"></script>

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/outsider.js"></script>

</head>
<body>

	<div class="header fast-animated clearfix">
		<div class="line ui page grid page-gray" style="background-color:#F5F5F5">
			<div class="column">
				<div class="ui search selection dropdown pull-right">
					<input id="language_option" name="language" type="hidden">					
					<div class="default text">Select Language</div>
					<i class="dropdown icon"></i>
					<div class="menu laguage-select" style="z-index: 1000;">
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
					<a class="item" href="#/services">
					     Servicios
					</a>				
					<a class="item" href="#/projects">
					     Proyectos
					</a>	
					<a class="item" href="#/costumer">
					    Clientes
					</a>
					<a class="item" href="#/contact">
						Contacto
					</a>
					<a class="item" href="#/about">
						Nosotros
					</a>
				  </div>
				</div>

			</div>
		</div>
	</div>
	<div class="content" >
		<div id="principal" class="minimal">

		</div>
		<?php 

		$criteria = new CDbCriteria;
		$criteria->condition="language = 'es' and estado=1 AND is_deleted=0";
		$criteria->limit = 1000;
		// $criteria->order="ASC"

        $menu=Menu::model()->findAll($criteria);

        
		foreach ($menu as $value) {
			// print_r($value->attributes['name']);
		?>
		<div id="<?=str_replace('/','',$value->attributes['url'])?>" class="<?=$value->attributes['minimal']?'minimal':'external'?>">
			
		</div>
		<?php
		}
		?>
		
		<a href="https://plus.google.com/107866117296817349154" class="hidden" rel="publisher">Google+</a>
	</div>
	
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-59364762-1', 'auto');
	  ga('send', 'pageview');
	  
	  

	</script>

	
</body>
</html>