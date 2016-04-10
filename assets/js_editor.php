<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.0.min.js"></script> -->
<script>
  if(!window.jQuery)
  {
     var script = document.createElement('script');
     script.type = "text/javascript";
     script.src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/plugins/jquery-2.1.0.min.js";
     document.getElementsByTagName('head')[0].appendChild(script);
  }
  var $editor_tooltip_delete="<?=Yii::t('app','editor.tooltip.delete')?>";
  var $editor_tooltip_details="<?=Yii::t('app','editor.tooltip.details')?>";
  var $editor_tooltip_edit="<?=Yii::t('app','editor.tooltip.edit')?>";
  var $editor_tooltip_sort="<?=Yii::t('app','editor.tooltip.sort')?>";
  var $editor_buttons_add="<?=Yii::t('app','editor.buttons.add')?>";
  var $editor_buttons_save="<?=Yii::t('app','editor.buttons.save')?>";
  var $editor_buttons_close="<?=Yii::t('app','editor.buttons.close')?>";
  var $editor_popout_delete="<?=Yii::t('app','editor.popout.delete')?>";

</script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/plugins/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/inline-tools.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/jquery-beat.min.js"></script>


<!--[inline editor]-->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/min/?g=inlineEditorJs"></script>

<!--language plugin version-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/languages/<?=Yii::app()->language?>.js"></script>

<!--[end]-->

<script type="text/javascript">
	var $base_url="<?php echo Yii::app()->request->baseUrl;?>";
  var $is_master="<?php echo Yii::app()->user->checkAccess('webmaster')?Yii::app()->user->checkAccess('webmaster'):0;?>";
  $('body').append('<div class="loading-container"><svg version="1.1" id="L7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><path fill="#fff" d="M31.6,3.5C5.9,13.6-6.6,42.7,3.5,68.4c10.1,25.7,39.2,38.3,64.9,28.1l-3.1-7.9c-21.3,8.4-45.4-2-53.8-23.3c-8.4-21.3,2-45.4,23.3-53.8L31.6,3.5z"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="2s" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform></path><path fill="#fff" d="M42.3,39.6c5.7-4.3,13.9-3.1,18.1,2.7c4.3,5.7,3.1,13.9-2.7,18.1l4.1,5.5c8.8-6.5,10.6-19,4.1-27.7c-6.5-8.8-19-10.6-27.7-4.1L42.3,39.6z"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="-360 50 50" repeatCount="indefinite"></animateTransform></path><path fill="#fff" d="M82,35.7C74.1,18,53.4,10.1,35.7,18S10.1,46.6,18,64.3l7.6-3.4c-6-13.5,0-29.3,13.5-35.3s29.3,0,35.3,13.5L82,35.7z"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="2s" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform></path></svg></div>');
</script>

<!-- AngularJs version 1.3.15-->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/min/?g=angularJs"></script>

<script type="text/javascript">

  
          
  var $froala=angular.module('froala', []);
  // angular.module('froala', []).
    $froala.value('froalaConfig', {
          toolbarInline: true,
          enter: $.FroalaEditor.ENTER_BR,
          language: '<?=Yii::app()->language?>',
          charCounterCount: false,
          imageUploadURL: 'api/upload',
          imageUploadParam: 'images',
          imageManagerLoadURL:'api/images',
          imageManagerDeleteURL:'api/deleteImage/files',
          fileUploadURL: 'api/upload',
          fileUploadParam: 'images',
          linkAttributes: {
            'title':'Titulo'
          },
          linkStyles: {
            "btn btn-default btn-select":"boton gris",
            "pull-right":"boton a la derecha"
          },
          imageStyles: {
            "lightboxImage": 'lightboxImage',
          },
          <?php
          if (!Yii::app()->user->checkAccess("webmaster")){
          ?>
          imageEditButtons: ['imageReplace', 'imageRemove', 'imageStyle', '|', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', 'imageSize'],
          toolbarButtons:['bold', 'italic', 'underline', 'strikeThrough','fontFamily', 'fontSize', '|', 'color', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', 'insertHR', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', 'undo', 'redo', 'clearFormatting', 'selectAll'],
          <?php } ?>
          linkList: [
            {
              text: 'Cigarrita',
              href: 'http://cigarrita-worker.com',
              target: '_blank'
            },
            {
              displayText: 'my Web',
              href: 'http://'+$base_url,
              target: '_blank'
            }
          ],
    });
    
    $froala.value('froalaConfigModal', {
          toolbarInline: false,
          enter: $.FroalaEditor.ENTER_BR,
          height: '270',
          language: '<?=Yii::app()->language?>',
          charCounterCount: false,
          imageUploadURL: 'api/upload',
          imageUploadParam: 'images',
          imageManagerLoadURL:'api/images',
          imageManagerDeleteURL:'api/deleteImage/files',
          fileUploadURL: 'api/upload',
          fileUploadParam: 'images',
          linkAttributes: {
            'title':'Titulo'
          },
          linkStyles: {
            "btn btn-default btn-select":"boton gris",
            "pull-right":"boton a la derecha"
          },
          imageStyles: {
            "lightboxImage": 'lightboxImage',
          },
          <?php
          if (!Yii::app()->user->checkAccess("webmaster")){
          ?>
          imageEditButtons: ['imageReplace', 'imageRemove', 'imageStyle', '|', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', 'imageSize'],
          toolbarButtons:['bold', 'italic', 'underline', 'strikeThrough','fontFamily', 'fontSize', '|', 'color', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', 'insertHR', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', 'undo', 'redo', 'clearFormatting', 'selectAll'],
          <?php } ?>
          linkList: [
            {
              text: 'Cigarrita',
              href: 'http://cigarrita-worker.com',
              target: '_blank'
            },
            {
              displayText: 'my Web',
              href: 'http://'+$base_url,
              target: '_blank'
            }
          ],
    });

  
</script>
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
        $_template=$this->render_page('site',$value->url);
    ?>
      when('<?=$value->url?>', {
        // templateUrl: $base_url+'/api/template<?=$value->url?>/site',
        template:'<?php echo $_template; ?>',
        controller: 'pageCtrl',
        pageid: <?=$value->page?>,
        reloadOnSearch: false
      }).
    <?php 
    }
  }
    ?>
    <?php 
    foreach ($pages as $pag_val) { 
      if ($pag_val->single_page) {
        $_template=$this->render_page('site',$pag_val->name);
    ?>
      
      when('/<?=$pag_val->name?>/:id/:name', {
        // templateUrl: $base_url+'/api/template/<?=$pag_val->name?>/site',
        template:'<?php echo $_template; ?>',
        controller: 'singleCtrl'
      }).
    <?php 
      } 
    } 
    ?>
    <?php 
    foreach ($pages as $pag_val) { 
      if ($pag_val->name=="home") {
        $_template=$this->render_page('site','home');
    ?>
      when('/:link', {
        // templateUrl: $base_url+'/api/template/home/site', //router template with api
        template:'<?php echo $_template; ?>',
        controller: 'homeCtrl',
        pageid: <?=$pag_val->idpage?>
      }).
    <?php 
      } 
    } 
    ?>
      otherwise({
        redirectTo: '/home'
      });

  }]);

</script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/min/?g=cigarritaApp"></script>

<!--[/cigarrita Angular Path]-->
	