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
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/inline-tools.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/jquery-beat.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/summernote/summernote/v0.6.16/dist/summernote.min.js"></script> 

<script data-require="wysihtml5@*" data-semver="0.3.0" src="//cdnjs.cloudflare.com/ajax/libs/wysihtml5/0.3.0/wysihtml5.min.js"></script>
<script data-require="lodash.js@1.3.1" data-semver="1.3.1" src="http://cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.min.js"></script>

<!--[inline editor]-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/froala_editor.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/align.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/code_beautifier.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/code_view.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/colors.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/emoticons.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/font_size.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/font_family.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/image.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/image_manager.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/line_breaker.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/link.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/lists.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/paragraph_format.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/paragraph_style.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/video.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/table.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/url.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/emoticons.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/file.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/entities.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/char_counter.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/inline_style.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/save.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/plugins/fullscreen.min.js"></script>


<!--[end]-->

<script type="text/javascript">
	var $base_url="<?php echo Yii::app()->request->baseUrl;?>";
</script>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-route.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-resource.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/angular-summernote.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/angular-froala.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/froala-sanitize.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/cigarrita.js"></script>
<script type="text/javascript">
  var beans=new Beans();

  beans.createCookie('language.initial',"<?=$config->language?>",10);
  
</script>
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
        templateUrl: $base_url+'/api/template<?=$value->url?>/site',
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
        pageid: 7
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
	