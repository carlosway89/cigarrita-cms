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
                    			<h5 class="">Lists of the pages</h5>
                                <p>Select the pages you want to convert in the views to the website</p>
                                <form method="POST">
                                <table>
                                    <thead>
                                        <tr>
                                            <th data-field="state"><p><input type="checkbox" id="check_all" onchange="checkAll(this)" ><label for="check_all" >Select</label></p></th>
                                            <th data-field="name">Page Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($files as $key => $value) {
                                        ?>
                                        <tr>
                                            <td>
                                                <p>
                                                  <input type="checkbox" id="file_<?=$key?>" name="File[<?=$key?>]" />
                                                  <label for="file_<?=$key?>"></label>
                                                </p>
                                            </td>
                                            <td><?=$value?></td>                                            
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                                <br>
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

<script type="text/javascript">
     function checkAll(ele) {
         var checkboxes = document.getElementsByTagName('input');
         if (ele.checked) {
             for (var i = 0; i < checkboxes.length; i++) {
                 if (checkboxes[i].type == 'checkbox') {
                     checkboxes[i].checked = true;
                 }
             }
         } else {
             for (var i = 0; i < checkboxes.length; i++) {
                 console.log(i)
                 if (checkboxes[i].type == 'checkbox') {
                     checkboxes[i].checked = false;
                 }
             }
         }
     }
</script>
