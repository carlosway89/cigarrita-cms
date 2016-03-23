<!DOCTYPE html>
<?php include(Yii::app()->
    request->baseUrl."assets/init_config.php"); ?>
    <html lang="en" ng-app="cigarritaWeb">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="cigarrita worker">
            <title>Cigarrita Demo - Demo Theme</title>
            <!-- Bootstrap Core CSS -->
            <link href="/themes/design/css/bootstrap.min.css" rel="stylesheet">
            <!-- Custom CSS -->
            <link href="/themes/design/css/agency.css" rel="stylesheet">
            <!-- Custom Fonts -->
            <link href="/themes/design/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
            <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
            <?php include($request."assets/css_editor.php"); ?>
                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->
            </head>
            <body id="page-top" class="index" ng-controller="indexCtrl">
                <!-- Navigation -->
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header page-scroll">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            <a class="navbar-brand page-scroll" href="/" style="font-weight: 300;font-family: 'Great Vibes';font-size: 50px;color: #047BB3;">Cigarrita <small style="font-family: 'Lato';font-size: 20px;color: #777;">Worker</small></a> 
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right header-options">
                                <li class="hidden"> <a href="#page-top"></a> </li>
                                <li  ng-repeat="link in links"  > <a ng-href="{{link.url}}" menu-links="{{link.type}}" >{{link.name}}</a> </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
                <div ng-view="">
                    <!--content-->
                </div>
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4"> <span class="copyright">Copyright &copy; <a href="http://cigarrita-worker.com">Cigarrita Worker</a> 2016</span> </div>
                            <div class="col-md-4">
                                <ul class="list-inline social-buttons">
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-inline quicklinks">
                                    <li><a href="/impressum">Impressum</a> </li>
                                    <li><a href="/prices">Softwares & prices</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- jQuery -->
                <script src="/themes/design/js/jquery.js"></script>
                <!-- Bootstrap Core JavaScript -->
                <script src="/themes/design/js/bootstrap.min.js"></script>
                <!-- Plugin JavaScript -->
                <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
                <script src="/themes/design/js/classie.js"></script>
                <script src="/themes/design/js/cbpAnimatedHeader.js"></script>
                <!-- Contact Form JavaScript -->
                <script src="/themes/design/js/jqBootstrapValidation.js"></script>
                <script src="/themes/design/js/contact_me.js"></script>
                <!-- Custom Theme JavaScript -->
                <script src="/themes/design/js/agency.js"></script>
                <?php include($request."assets/js_editor.php"); ?>
                </body>
            </html>