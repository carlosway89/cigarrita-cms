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
    <meta name="keywords" content="aplication, web, software, internet, design, developer, elance, SEO, remote work "/>
    <meta name="robots" content="INDEX,FOLLOW">

	<link rel="stylesheet" type="text/css" href="<?=$theme;?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=$theme;?>/css/semantic.min.css">
	
	<link rel="stylesheet" type="text/css" href="<?=$theme;?>/css/style.css">

	<script type="text/javascript" src="<?=$theme;?>/js/jquery-2.1.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

	<script type="text/javascript" src="<?=$theme;?>/js/webfont.js"></script> 
	<script type="text/javascript" src="<?=$theme;?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=$theme;?>/js/semantic.js"></script>
	<script type="text/javascript" src="<?=$theme;?>/js/outsider.js"></script>
	
	<!--[/cigarrita Angular Web]-->
	<?php include($request."assets/js_index.php"); ?>	
	<!--[/cigarrita Angular Web]-->

	
	

	
</head>
<body>

	<div id="external_links"></div>
	<div class="header fast-animated clearfix" ng-controller="indexCtrl">
		<div class="line ui page grid page-gray" style="background-color:#F5F5F5">
			<div class="column">
				<div class="ui search selection dropdown pull-right"  language-select="language">
					<input id="language_option" name="language" type="hidden" value="{{current}}">					
					<div class="default text">Select Language</div>
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
		<a href="https://plus.google.com/107866117296817349154" class="hidden" rel="publisher">Google+</a>
	</div>
	
	
	<?php if($config->analytic_id){?>
	<script>
	  // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  // ga('create', '<?=$config->analytic_id?>', 'auto');
	  // ga('send', 'pageview');
	</script>
	<?php } ?>

	
</body>
</html>