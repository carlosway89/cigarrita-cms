<header class="header header-fixed navbar container-fluid">
  <div class="row">
      <div class="brand col-lg-2">
          <a href="#" class="navbar-brand">
              
              <span class="heading-font">Manager System</span>
          </a>
      </div>
      <div class="col-lg-10">
        <div class="pull-right">
          <i class=""></i>
        </div>
      </div>
  </div>
</header>

<div class="wrapper">

  <!-- <header> ...  -->
  
    <div class="box">
        <div class="row">
        
          <!-- sidebar -->
            <div class="column col-md-2 hidden-sm hidden-xs" id="sidebar">
               <!-- content -->
               <div style="margin-top:100px">
                 <ul class="list-unstyled list-menu panels ">
                  <li  ><a href="#languages"><i class="flag icon"></i> Manage Languages</a></li>
                  <li><a href="#/pages"><i class="browser icon"></i> Manage Pages</a></li>
                  <!-- <li><a href="#menu"><i class="glyphicon glyphicon-link "></i> Manage Menu</a></li> -->
                  <li><a href="#/media"><i class="photo icon"></i> Media</a></li>
                  <li><a href="#/comments"><i class="comment icon"></i> Comments</a></li>
                  <li><a href="#/messages"><i class="mail icon"></i> Messages</a></li>
                  <li><a href="#/users"><i class="users icon"></i> Manage Users</a></li>
                  <li><a href="#/settings"><i class="settings icon"></i> Settings</a></li>
                  <li><a href="site/logout"><i class="glyphicon glyphicon-off  icon"></i> Logout</a></li>
                 </ul>
               </div>
            </div>
          <!-- /sidebar -->
        
          <!-- main here -->

            <div class="column col-md-10 col-sm-12" id="main" style="background-position: left 50px;background-size: 20% auto;height:100%">
                <div class="padding" style="margin-top:200px;margin-bottom:100px;">
                    <div class="row">
                      <div class="full col-md-12">
                        
                        <div class="col-sm-3">
                          <a class="button-box text-success block" href="#/pages">
                            <i class="laptop icon huge"></i>
                            <h4 class="no-botton-margin small-text">Manage Pages</h4>
                          </a>
                        </div>
                        <div class="col-sm-3">
                          <a class="button-box text-info block" href="#/languages">
                            <i class="translate icon huge"></i>
                            <h4 class="no-botton-margin small-text">Languages</h4>
                          </a>
                        </div>
                        <div class="col-sm-3">
                          <a class="button-box text-warning block" href="#/messages">
                            <i class="mail outline icon huge"></i>
                            <h4 class="no-botton-margin small-text">Messages</h4>
                          </a>
                        </div>
                        <div class="col-sm-3">
                          <a class="button-box text-danger block" href="site/logout">
                            <i class="glyphicon glyphicon-off icon huge"></i>
                            <h4 class="no-botton-margin small-text">Logout</h4>
                          </a>
                        </div>                      
                      </div>
                    </div>
                    <div class="row">                    
                      <div class="col-lg-12">
                        <br>
                        <ol class="breadcrumb">
                          <li><a href="/">Home</a></li>
                          <li><a href="#">Panel</a></li>
                          <!-- <li id="bread_pos" class="active">Languages</li> -->
                        </ol>
                        <div class="panel-content " >
                          <div class="view-frame" ng-view>
                          </div>  
                        </div>
                      </div>
                    </div>

                    <!-- /col- -->
                </div><!-- /padding -->
                


            </div>

          
          <!-- /main here -->
        
        </div>
    </div>
</div>
<div id="modales" class="ui dimmer modals page transition"></div>
