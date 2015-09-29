<div class="wrapper">

  <!-- <header> ...  -->
  
    <div class="box">
        <div class="row">
        
          <!-- main here -->

            <div class="column col-lg-12" id="main">
                <div class="padding">
                    <div class="full col-lg-12 login-box">
                      
                        <!-- content -->

                    	<div class="col-md-offset-2 col-md-8 panel panel-default">
                    		
                    		<div class="panel-body ">
                    			<h5 class="text-center">Create your User Name<h5>
                                    <br>
                                <?php echo $this->renderPartial('//user/_form', 
                                    array(
                                            'model'=>$model
                                        )
                                    ); 
                                ?>
                                <br><br><br>
                    		</div>
                    		
                            
                    	</div>
                        
  
                      
                    </div><!-- /col- -->
                </div><!-- /padding -->
            </div>
          
          <!-- /main here -->
        
        </div>
    </div>
</div>
