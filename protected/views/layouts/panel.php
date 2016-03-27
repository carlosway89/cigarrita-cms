<!DOCTYPE html>
<html lang="es" style="<?=$this->action->id!='index'?'overflow-y:scroll !important':''?>">

<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Cigarrita CMS</title>

	<meta name="description" content="">
	<meta name="author" content="Akshay Kumar">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/css/bootstrap/bootstrap.css" /> 
  
  <!-- Cigarrita core CSS -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/css/flag-icon.min.css" />

  <!-- MaterializeCSS -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/css/materialize/materialize.css" /> 
  
  <!-- Summernote -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/css/plugins/summernote/summernote.css" /> 

  <!-- Codemirror-->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/codemirror/lib/codemirror.css" />
  
  <!-- Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
  <!--[inline-editor] -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/froala_editor.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/froala_style.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/code_view.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/colors.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/emoticons.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/image_manager.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/image.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/table.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/file.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/char_counter.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/video.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/emoticons.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/css/plugins/fullscreen.css">
  <style type="text/css">
    .modal-backdrop {
        z-index: 99;
    }
    .tt-dropdown-menu {
        background-color: #FFF;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        margin-top: -12px;
        padding: 8px 10px;
        /*width: 100%;*/
        width: -moz-max-content;
    }
    .tt-suggestion{
      padding: 5px;
    }
    .tt-suggestion.tt-is-under-cursor{
      padding: 5px;
      background-color: rgba(0,0,0,0.1);
      border-radius: 5px;
      color: #222;
    }
    .twitter-typeahead{
      width:100%;
    }
  </style>
  <!-- [end] -->
   <!-- Chosen Select  -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/css/plugins/bootstrap-chosen/chosen.css" />

  <!-- Base Styling  -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/css/app/app.v1.css" />
    
    <style type="text/css">
      input.counter_char + .character-counter{
          display: none;
      }
    </style>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    

</head>
<body>	
	<!-- Preloader -->
    <div class="loading-container">

      <div class="loading">
        <div class="preloader-wrapper big active">
          <div class="spinner-layer spinner-green-only ">
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div><div class="gap-patch">
              <div class="circle"></div>
            </div><div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>

        </div>

      </div>
    </div>
    <!-- Preloader -->
    
	<aside class="left-panel collapsed">
    		    <?php 

              $config_val=Configuration::model()->find();

              $logo=$config_val->logo?Yii::app()->request->baseUrl.$config_val->logo:Yii::app()->request->baseUrl."/assets/panel/images/avtar/cigarrita-pet.jpg";
              $url=Yii::app()->request->getPathInfo();
              $uri = explode("/", $url);
              $current_uri=isset($uri[1])?$uri[1]:"";
              
              $post_active="";
              $pages_active="";
              $links_active="";
              $facebook_active="";
              $panel_active="";

              switch ($current_uri) {
                case 'posts':
                  $post_active="active";
                  break;
                case 'pages':
                  $pages_active="active";
                  break;
                case 'links':
                  $links_active="active";
                  break;
                case 'facebook':
                  $facebook_active="active";
                  break;                
                default:
                  $panel_active="active";
                  break;
              }
            ?>
            <div class="user text-center">
                  <img src="<?php echo Yii::app()->request->baseUrl."/".$logo?>" class="img-circle" alt="cigarrita worker">
                  <h4 class="user-name"><?php echo Yii::app()->user->getState('fullname');?></h4>
            </div>
            
            <nav class="navigation">
            	<ul class="list-unstyled">
                	  <li class="<?=$panel_active?>"><a href="<?=Yii::app()->getBaseUrl(true)?>/panel"><i class="fa fa-laptop"></i><span class="nav-label">design</span></a></li>
                    <li class="has-submenu <?=$post_active?>">
                      <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/posts"><i class="fa fa-newspaper-o"></i> <span class="nav-label"><?=Yii::t('app','panel.posts')?></a>
                      <ul class="list-unstyled">
                          <?php 
                          $list_category=Category::model()->findAll("tag='panel'");
                          foreach ($list_category as $cat_val) {                            
                          ?>
                          <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/posts/<?=$cat_val->category?>"><?=Yii::t('app','panel.posts')?> - <strong><?=$cat_val->category?></strong></a></li>                         
                          <?php }?>
                      </ul>
                    </li>
                    <li class="<?=$pages_active?> has-submenu"><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/pages"><i class="fa fa-file-o"></i> <span class="nav-label"><?=Yii::t('app','panel.pages')?></span></a>
                    	<ul class="list-unstyled">
                          <?php if (Yii::app()->user->checkAccess("webmaster")) {
                          ?>
                        	<li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/pages"><?=Yii::t('app','panel.pages')?></a></li>
                          <?php }?>
                          <?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                          ?>
                          <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/blocks"><?=Yii::t('app','panel.blocks')?></a></li>                
                          <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/users"><?=Yii::t('app','panel.users')?></a></li>                          
                          <?php }?>
                          <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/config"><?=Yii::t('app','panel.config')?></a></li>
                        </ul>
                    </li>
                    
                    <li class="<?=$links_active?> has-submenu"><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/links"><i class="fa fa-link"></i> <span class="nav-label"><?=Yii::t('app','panel.menus')?></span></a>
                    	<ul class="list-unstyled">
                        	<li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/links"><?=Yii::t('app','panel.menus')?></a></li>
                        </ul>
                    </li>
                    <?php if (Yii::app()->user->checkAccess("webmaster")) {
                          ?>
                    <li class="<?=$facebook_active?> has-submenu"><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/facebook"><i class="fa fa-facebook"></i> <span class="nav-label"><?=Yii::t('app','panel.facebook')?></span></a>
                    	<ul class="list-unstyled">
                        	<li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/facebook#feeds" target="_self">Feeds</a></li>
                        	<li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/facebook#events" target="_self">Events</a></li>
                          <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/facebook#gallery" target="_self">Gallery</a></li>
                          <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/facebook#contact" target="_self">Contact</a></li>
                          <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/facebook#about" target="_self">About</a></li>                            
                        </ul>
                    </li>
                    <?php }?>
                </ul>
            </nav>
            
    </aside>
    
    <section class="content">
    	
        <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left hidden-lg hidden-md hidden-sm">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            
            
            <nav class=" navbar-default hidden-xs" role="navigation">
              <?php 

                $model_language=Language::model()->findAll("is_deleted='0'");

              ?>
                <ul class="nav navbar-nav">
                <li><a href="<?=Yii::app()->getBaseUrl(true)?>" target="_blank"><i class="fa fa-play"></i> <?=Yii::t('app','panel.livewebsite')?></a></li>
                <?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                                ?>
                <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?=Yii::t('app','panel.languages')?> <span class="caret"></span></a>
                  <ul role="menu" class="dropdown-menu">
                    <?php foreach ($model_language as $key => $value) {
                    ?>
                    <li>
                      <a href="#"><?=$value->name?> 
                        <div class="switch">
                          <label>
                            Off
                            <input class="lang-switch" type="checkbox" data-value="<?=$value->min?>" data-id="<?=$value->idlanguage?>" <?=$value->estado?'checked="checked"':''?>>
                            <span class="lever"></span>
                            On
                          </label>
                        </div>
                      </a>
                    </li>
                    <?php } ?>
                    <li class="divider"></li>
                    <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/language#modal_language">+ <?=Yii::t('app','panel.new_language')?></a></li>
                  </ul>
                </li>
                <?php }?>
                <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/help" target="_blank"><i class="fa fa-book"></i> <?=Yii::t('app','panel.help')?></a></li>
              </ul>
            </nav>
            
            <ul class="nav-toolbar">
              <?php 

              
              
                $criteria = new CDbCriteria;

                $criteria->order="date DESC";
                $criteria->limit="5";
                $criteria->condition="state='new' AND is_deleted='0'";

                $model_message=Form::model()->findAll($criteria);

                $msgs=Form::model()->count("state = 'new' AND is_deleted='0'");

              ?>
          	<li class="dropdown">
              <a href="#" data-toggle="dropdown">
                <i class="fa fa-comments-o"></i> 
                <?php
                  if ($msgs!=0) {
                ?>
                <span class="badg bg-warning"><?=$msgs?></span>
                <?php }?>
              </a>
              	<div class="dropdown-menu md arrow pull-right panel panel-default arrow-top-right messages-dropdown">
                      <div class="panel-heading">
                    	<?=Yii::t('app','panel.messages')?>
                      </div>
                      
                      <div class="list-group">
                          <?php 

                          if ($msgs==0) {
                            ?>
                            <div class="media">
                              <div class="media-body">
                                <h6 class="text-center">0 <?=Yii::t('app','panel.messages.news')?></h6>
                              </div>
                            </div>

                          <?php
                          }

                          foreach ($model_message as $key => $value) {
                          ?>
                          <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/messages/<?=$value->idform?>" class="list-group-item">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="text-info"><?=$value->email?></h6>
                                <h6 class="media-heading"><?=substr($value->subject, 0, 30)."..."?></h6>
                                <small class="text-muted"><?=$value->date?></small>
                              </div>
                            </div>
                          </a>
                          <?php } ?>
                          
                          <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/messages" class="btn btn-info btn-flat btn-block"><?=Yii::t('app','panel.see_all_messages')?></a>

                      </div>
                      
                  </div>
              </li>
              
              <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="fa fa-bell-o"></i>
                  <span class="badg">1</span>
                </a>
                	<div class="dropdown-menu arrow pull-right md panel panel-default arrow-top-right notifications">
                        <div class="panel-heading">
                      	<?=Yii::t('app','panel.notifications')?>
                        </div>
                        
                        <div class="list-group">
                            <a href="http://cigarrita-worker.com/contact" target="_blank" class="list-group-item">
                              welcome to CMS Cigarrita Worker, keep updated to clicking here
                            </a>
                            <p class="list-group-item">Current <strong>version 1.3 </strong> Cigarrita CMS!!</p>
                            <p class="list-group-item" >
                              - Developed by Cigarrita Worker<br/>
                              - Author: Carlos Manay<br/>
                              - Built with YII 1.1 & AngularJs<br>
                              - Copyright <?=date("Y")?>
                            </p>
                        </div>
                        
                    </div>
              </li>
              <li class="dropdown"><a href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                	<div class="dropdown-menu lg pull-right arrow panel panel-default arrow-top-right">
                    	<div class="panel-heading">
                        	<?=Yii::t('app','panel.options')?>
                        </div>
                        <div class="panel-body text-center">
                        	<div class="row">
                            	<div class="col-xs-6 col-sm-4"><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/messages" class="text-green"><span class="h2"><i class="fa fa-envelope-o"></i></span><p class="text-gray no-margn"><?=Yii::t('app','panel.messages')?></p></a></div>
                                
                                <div class="col-xs-6 col-sm-4"><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/config" class="text-purple"><span class="h2"><i class="fa fa-file-text-o"></i></span><p class="text-gray no-margn"><?=Yii::t('app','panel.configurations')?></p></a></div>
                                
                                <div class="col-xs-12 visible-xs-block"><hr></div>
                                
                                <div class="col-xs-6 col-sm-4"><a href="<?=Yii::app()->request->baseUrl?>/site/logout" class="text-red"><span class="h2"><i class="fa fa-sign-out"></i></span><p class="text-gray no-margn"><?=Yii::t('app','panel.logout')?></p></a></div>
                                                      
                          </div>
                        </div>
                    </div>
              </li>
            </ul>
        </header>
        <!-- Header Ends -->
        
        
        <div class="data-container">
        	
            <div class="data-content">
                <?php echo $content; ?>    
            </div>
            <!-- Content Here -->
            
        </div>
        <!-- Warper Ends Here (working area) -->
        
        
        <!-- <footer class="container-fluid footer">
        	Copyright &copy; 2015 <a href="http://cigarrita-worker.com/" target="_blank">Cigarrita Worker</a>
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer> -->
        
    
    </section>
    <!-- Content Block Ends Here (right box)-->
    
    
    
    <!-- JQuery v1.9.1 -->
	   <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/plugins/underscore/underscore-min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/bootstrap/bootstrap.min.js"></script>
    
    <!-- DataTables -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/jquery.dataTables.min.js"></script>

    <!-- DataTables -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/jquery.dataTables.bootstrap.js"></script>

    <!-- Materialize -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/materialize/materialize.min.js"></script>
    
    <!-- Wysihtml5 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.js"></script>

    <!-- Summernote -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/plugins/summernote/summernote.min.js"></script>

    <!-- Codemirror-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/codemirror/lib/codemirror.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/codemirror/mode/xml/xml.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/codemirror/mode/javascript/javascript.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/codemirror/mode/css/css.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/codemirror/addon/edit/matchbrackets.js"></script>
    
    <!-- Globalize -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/globalize/globalize.min.js"></script>
    
    <!-- NanoScroll -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- Cigarrita JQuery -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/js/cigarrita.js" type="text/javascript"></script>
  <script type="text/javascript">
     var $baseURL="<?=Yii::app()->getBaseUrl(true)?>/panel";
  </script>
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
<!--language plugin version-->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/editor/inline_editor/js/languages/<?=Yii::app()->language?>.js"></script>
  <!-- 
  To get current language: 
  $lang = Yii::app()->language; 

  To set current language:
  Yii::app()->language = ‘en'; 
  -->
<!-- Typeahead Bootstrap -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/plugins/typehead/typeahead.js" type="text/javascript"></script>

<!-- chosen Bootstrap -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/plugins/bootstrap-chosen/chosen.jquery.js" type="text/javascript"></script>

<!-- Custom JQuery -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/app/custom.js" type="text/javascript"></script>
    
  <script type="text/javascript">
    $(document).ready(function() {
      $('.delete-link').click(function(event){
        if(!confirm('Esta seguro que desea eliminar este item?')) return false;
      });

    });
    $(function() {
      $('.froala-editor').froalaEditor({
              toolbarInline: false,
              height: 250,
              enter: $.FroalaEditor.ENTER_BR,
              language: '<?=Yii::app()->language?>',
              charCounterCount: false,
              imageUploadURL: "<?=Yii::app()->getBaseUrl(true)?>/api/upload",
              imageUploadParam: 'images',
              imageManagerLoadURL:"<?=Yii::app()->getBaseUrl(true)?>/api/images",
              imageManagerDeleteURL:"<?=Yii::app()->getBaseUrl(true)?>/api/deleteImage/files",
              linkAttributes: {
                'title':'Titulo'
              },
              imageStyles: {
                "lightboxImage": 'lightboxImage',
              },
              <?php
              if (!Yii::app()->user->checkAccess("webmaster")){
              ?>
              imageEditButtons: ['imageReplace', 'imageRemove', 'imageStyle', '|', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', 'imageSize'],
              toolbarButtons:['bold', 'italic', 'underline', 'strikeThrough','fontFamily', 'fontSize', '|', 'color', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', 'insertHR', 'insertLink', 'insertImage', 'insertVideo', 'insertTable','-', 'undo', 'redo', 'clearFormatting', 'selectAll'],
              <?php } ?>
              linkList: [
                {
                  text: 'Cigarrita',
                  href: 'http://cigarrita-worker.com',
                  target: '_blank'
                }
              ],
      })
      $('.froala-editor-inline').froalaEditor({
              toolbarInline: true,
              enter: $.FroalaEditor.ENTER_BR,
              language: '<?=Yii::app()->language?>',
              charCounterCount: false,
              imageUploadURL: "<?=Yii::app()->getBaseUrl(true)?>/api/upload",
              imageUploadParam: 'images',
              imageManagerLoadURL:"<?=Yii::app()->getBaseUrl(true)?>/api/images",
              imageManagerDeleteURL:"<?=Yii::app()->getBaseUrl(true)?>/api/deleteImage/files",
              linkAttributes: {
                'title':'Titulo'
              },
              imageStyles: {
                "lightboxImage": 'lightboxImage',
              },
              <?php
              if (!Yii::app()->user->checkAccess("webmaster")){
              ?>
              imageEditButtons: ['imageReplace', 'imageRemove', 'imageStyle', '|', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', 'imageSize'],
              toolbarButtons:['insertImage'],
              <?php } ?>
              linkList: [
                {
                  text: 'Cigarrita',
                  href: 'http://cigarrita-worker.com',
                  target: '_blank'
                }
              ],
      })
      

      setTimeout(function(){
        $("body").find('a[href="https://froala.com/wysiwyg-editor"]').remove();
      },100)
    });
  </script>
</body>

</html>
