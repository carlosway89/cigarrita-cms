<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl;?>/assets/css/flag-icon.min.css">

<!--[/cigarrita Angular Path]-->
<script type="text/javascript">
	var $base_url="<?php echo Yii::app()->request->baseUrl;?>";
</script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-route.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-resource.min.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/cigarrita.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/app.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/router.js"></script>
<script type="text/javascript">
	
cigarritaApp.config(['$routeProvider','$locationProvider',
  function($routeProvider,$locationProvider) {

    $locationProvider.html5Mode({
      enabled: true,
      requireBase: false
    });
    
    $routeProvider.
    <?php 
    foreach ($menu as $value) {

			if ($value->type=="new") {
    ?>
      when('<?=$value->url?>', {
        templateUrl: $base_url+'/api/template/<?=$value->name?>/site',
        controller: 'pageCtrl',
        pageid: <?=$value->page?>,
        reloadOnSearch: false
      }).
    <?php 
		}
	}
    ?>
      when('/:link', {
        templateUrl: $base_url+'/api/template/home/site', //router template with api
        controller: 'homeCtrl',
        pageid: 1
      }).
      otherwise({
        redirectTo: '/home'
      });

  }]);

</script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/controllers/controllers.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modules/animations.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modules/filters.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modules/directives.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/models/services.js"></script>

<!--[/cigarrita Angular Path]-->