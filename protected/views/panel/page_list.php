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
                    		
                    		<div class="panel-body text-center">
                    			<h5 class="">List from of the pages</h5>
                                <p>Select the pages you want to convert in the views of the webiste</p>
                                <form method="POST">
                                <table>
                                    <thead>
                                        <tr>
                                            <th data-field="name">Page Name</th>
                                            <th data-field="state">Select</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($files as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><?=$value?></td>
                                            <td>
                                                <p>
                                                  <input type="checkbox" id="file_<?=$key?>" name="File[<?=$key?>]" />
                                                  <label for="file_<?=$key?>"></label>
                                                </p>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                                <button class="btn ">Create Pages</button>
                                </form>
                    		</div>
                    		
                            
                    	</div>
                        
  
                      
                    </div><!-- /col- -->
                </div><!-- /padding -->
            </div>
          
          <!-- /main here -->
        
        </div>
    </div>
</div>
