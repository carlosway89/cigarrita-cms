<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/css/inline-tools.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/css/flag-icon.min.css">

<style type="text/css">
  .loading-container {
    position: fixed;
    background-color: rgba(0,0,0,0.9);
    z-index: 9;
    top: 0px;
    left: 0px;
    height: 100%;
    width: 100%;
    cursor: wait;
    text-align: center;
    padding-top: 250px;
  }
  svg{
      width: 100px;
      height: 100px;
      margin: 20px;
      display:inline-block;
  }
  .selection.dropdown{
    margin: 10px;
    float: left !important;
    position: fixed !important;
    bottom: 0px !important;
    display: inline-block !important;
  }
  .menu.laguage-select{
      /*top: -250% !important;
      border-radius: 5px !important;*/
      height: 100px;
      bottom: -200px !important;
      top: -170% !important;
      border-radius: 5px !important;
  }
  .menu.laguage-select .item{
      font-size: 12px !important;
  }
  
</style>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.0.min.js"></script> -->
<script>
  if(!window.jQuery)
  {
     var script = document.createElement('script');
     script.type = "text/javascript";
     script.src = "https://code.jquery.com/jquery-2.1.0.min.js";
     document.getElementsByTagName('head')[0].appendChild(script);
  }
</script>
<!--[/cigarrita Angular Path]-->
<script type="text/javascript">

	var $base_url="<?php echo Yii::app()->request->baseUrl;?>";

  $('body').append('<div class="loading-container"><svg version="1.1" id="L7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><path fill="#fff" d="M31.6,3.5C5.9,13.6-6.6,42.7,3.5,68.4c10.1,25.7,39.2,38.3,64.9,28.1l-3.1-7.9c-21.3,8.4-45.4-2-53.8-23.3c-8.4-21.3,2-45.4,23.3-53.8L31.6,3.5z"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="2s" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform></path><path fill="#fff" d="M42.3,39.6c5.7-4.3,13.9-3.1,18.1,2.7c4.3,5.7,3.1,13.9-2.7,18.1l4.1,5.5c8.8-6.5,10.6-19,4.1-27.7c-6.5-8.8-19-10.6-27.7-4.1L42.3,39.6z"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="-360 50 50" repeatCount="indefinite"></animateTransform></path><path fill="#fff" d="M82,35.7C74.1,18,53.4,10.1,35.7,18S10.1,46.6,18,64.3l7.6-3.4c-6-13.5,0-29.3,13.5-35.3s29.3,0,35.3,13.5L82,35.7z"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="2s" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform></path></svg></div>');
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/web/js/dropdown_cw.js"></script>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-route.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-resource.min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/cigarrita.js"></script>
<script type="text/javascript">
  var beans=new Beans();

  beans.createCookie('language.initial',"<?=$config->language?>",10);
  
</script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/web/js/app.js"></script>
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
        templateUrl: $base_url+'/api/template<?=$value->url?>/site',
        controller: 'pageCtrl',
        pageid: <?=$value->page?>,
        reloadOnSearch: false
      }).
    <?php 
		}
	}
    ?>
    <?php foreach ($pages as $pag_val) { 
    ?>
      
      when('/post/:id/:name', {
        templateUrl: $base_url+'/api/template/<?=$pag_val->name?>/site',
        controller: 'singleCtrl'
      }).
    <?php } ?>

      when('/:link', {
        templateUrl: $base_url+'/api/template/home/site', //router template with api
        controller: 'homeCtrl',
        pageid: 7
      }).
      otherwise({
        redirectTo: '/home'
      });

  }]);

</script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/web/js/controllers/controllers.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/web/js/modules/animations.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/web/js/modules/filters.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/web/js/modules/directives.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/web/js/models/services.js"></script>

<!--[/cigarrita Angular Path]-->