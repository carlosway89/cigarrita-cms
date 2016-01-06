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
                        		
                                <?php if(Yii::app()->user->hasFlash('error')){ ?>
                                <div class="alert alert-danger">
                                    <?php echo Yii::app()->user->getFlash('error'); ?>
                                </div>
                                <?php } ?>

                                <div class="input-field col s12">
                                  <input placeholder="Usuario" id="user_name" type="text" name="LoginForm[username]" class="">
                                  <label for="user_name">Usuario</label>
                                </div>        
                                <div class="input-field col s12">
                                  <input placeholder="UserName" id="password" name="LoginForm[password]" type="password" placeholder="Contraseña" class="">
                                  <label for="password">Contraseña</label>
                                </div>                		                       		
                        		<br>
                                <div class="col s12 checkbox">
                                    <input type="checkbox" class="filled-in" id="filled-in-box" name="LoginForm[rememberMe]" />
                                    <label for="filled-in-box">Recuerdame por 30 dias</label>
                                </div>
                        		<button class="btn btn-info btn-md pull-right  red darken-1" type="submit">Iniciar Sesión</button>
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
