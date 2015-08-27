<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/inline-tools.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/summernote/summernote/v0.6.16/dist/summernote.min.js"></script> 

<script type="text/javascript">
	var $base_url="<?php echo Yii::app()->request->baseUrl;?>";
</script>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-route.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-resource.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/angular-summernote.js"></script>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/cigarrita.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/app.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/web/js/router.js"></script>
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

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/controllers/controllers.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/modules/animations.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/modules/filters.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/modules/directives.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/models/services.js"></script>
<!--[/cigarrita Angular Path]-->
	