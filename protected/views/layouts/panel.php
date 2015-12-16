<!DOCTYPE html>
<html lang="en" style="<?=$this->action->id!='index'?'overflow-y:scroll !important':''?>">

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
    		
            <div class="user text-center">
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/images/avtar/cigarrita-pet.jpg" class="img-circle" alt="cigarrita worker">
                  <h4 class="user-name"><?php echo Yii::app()->user->getState('fullname');?></h4>
            </div>
            
            <nav class="navigation">
            	<ul class="list-unstyled">
                	<li class="active"><a href="<?=Yii::app()->getBaseUrl(true)?>/panel"><i class="fa fa-laptop"></i><span class="nav-label">Dashboard</span></a></li>
                    <li class="has-submenu"><a href="#"><i class="fa fa-file-o"></i> <span class="nav-label">Web &amp; Pages</span></a>
                    	<ul class="list-unstyled">
                          <?php if (Yii::app()->user->checkAccess("webmaster")) {
                          ?>
                        	<li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/pages">Web Pages</a></li>
                          <?php }?>
                          <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/posts">Web Posts</a></li>
                          <?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                          ?>
                          <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/users">Web Users</a></li>
                          <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/config">Web Configuration</a></li>
                          <?php }?>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="#"><i class="fa fa-link"></i> <span class="nav-label">Menus &amp; Links</span></a>
                    	<ul class="list-unstyled">
                        	<li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/links">Menus / links</a></li>
                        </ul>
                    </li>
                    <?php if (Yii::app()->user->checkAccess("webmaster")) {
                          ?>
                    <li class="has-submenu"><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/facebook"><i class="fa fa-facebook"></i> <span class="nav-label">Facebook &amp; Sync</span></a>
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
                <li><a href="<?=Yii::app()->getBaseUrl(true)?>" target="_blank"><i class="fa fa-play"></i> Live Website</a></li>
                <?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                                ?>
                <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Languages <span class="caret"></span></a>
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
                    <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/language#modal_language">+ Add New Language</a></li>
                  </ul>
                </li>
                <?php }?>
                <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/help" target="_blank"><i class="fa fa-book"></i> Help</a></li>
              </ul>
            </nav>
            
            <ul class="nav-toolbar">
              <?php 

              if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
              
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
                      	Messages
                        </div>
                        
                        <div class="list-group">
                            <?php 

                            if ($msgs==0) {
                              ?>
                              <div class="media">
                                <div class="media-body">
                                  <h6 class="text-center">0 new messages</h6>
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
                            
                            <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/messages" class="btn btn-info btn-flat btn-block">View All Messages</a>

                        </div>
                        
                    </div>
                </li>
              <?php }?>
              <li class="dropdown"><a href="#" data-toggle="dropdown"><i class="fa fa-bell-o"></i>
                <span class="badg">1</span>
              </a>
                	<div class="dropdown-menu arrow pull-right md panel panel-default arrow-top-right notifications">
                        <div class="panel-heading">
                      	Notification
                        </div>
                        
                        <div class="list-group">
                            <a href="http://cigarrita-worker.com/contact" target="_blank" class="list-group-item">
                              Welcome to the CMS Cigarrita Worker, keep you update or in contact with us clicking here
                            </a>
                            <p class="list-group-item">You are currently in the <strong>1.1 version</strong> of Cigarrita CMS!!</p>
                            <p class="list-group-item" >
                              - Developed by Cigarrita Worker<br/>
                              - Author: Carlos Manay<br/>
                              - Built with YII 1.1 and AngularJs<br>
                              - Copyright 2015.
                            </p>
                            
                            
                            

                        </div>
                        
                    </div>
              </li>
              <li class="dropdown"><a href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                	<div class="dropdown-menu lg pull-right arrow panel panel-default arrow-top-right">
                    	<div class="panel-heading">
                        	Panel Options
                        </div>
                        <div class="panel-body text-center">
                        	<div class="row">
                            	<div class="col-xs-6 col-sm-4"><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/messages" class="text-green"><span class="h2"><i class="fa fa-envelope-o"></i></span><p class="text-gray no-margn">Messages</p></a></div>
                                <?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                                ?>
                                <div class="col-xs-6 col-sm-4"><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/config" class="text-purple"><span class="h2"><i class="fa fa-file-text-o"></i></span><p class="text-gray no-margn">Page Config</p></a></div>
                                <?php }?>
                                <div class="col-xs-12 visible-xs-block"><hr></div>
                                
                                <div class="col-xs-6 col-sm-4"><a href="<?=Yii::app()->request->baseUrl?>/site/logout" class="text-red"><span class="h2"><i class="fa fa-sign-out"></i></span><p class="text-gray no-margn">Log Out</p></a></div>
                                                      
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
    <!-- Custom JQuery -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/panel/js/app/custom.js" type="text/javascript"></script>
    

</body>

</html>
