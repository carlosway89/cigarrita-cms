<div class="wrapper">

  <!-- <header> ...  -->
  
    <div class="box">
        <div class="row">
        
          <!-- main here -->

            <div class="column col-lg-12" id="main">
                <div class="padding">
                    <div class="full col-lg-12 login-box">
                      
                        <!-- content -->

                        <form class="form-login" method="POST">
                        	<div class="col-md-offset-4 col-md-4 box">
                        		<h2 class="title" style="margin-top:0px"><i class="glyphicon glyphicon-user txt-warning"></i> Sign In</h2>
                        		<hr>
                                <?php if(Yii::app()->user->hasFlash('error')){ ?>
                                <div class="alert alert-danger">
                                    <?php echo Yii::app()->user->getFlash('error'); ?>
                                </div>
                                <?php } ?>
                        		<h4>Username</h4>                        		
                        		<input class="form-control" name="LoginForm[username]" type="text" placeholder="UserName">                        		
                        		<h4>Password</h4>                        		
                        		<input class="form-control" name="LoginForm[password]" type="password" placeholder="Password">                        		
                        		<br>
                                <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="LoginForm[rememberMe]"> Remember me 30 days
                                    </label>
                                </div>
                        		<button class="btn btn-info btn-md pull-right" type="submit">Login</button>
                        		<br><br>
                        	</div>
                        </form>
                        
  
                      
                    </div><!-- /col- -->
                </div><!-- /padding -->
            </div>
          
          <!-- /main here -->
        
        </div>
    </div>
</div>
