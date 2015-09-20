<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Manage Menu/Links</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						 <div class="dropdown col-sm-2">
		                  <a data-toggle="dropdown" class="dropdown-toggle btn grey lighten-1" href="#">Languages <span class="caret"></span></a>
		                  <ul class="dropdown-menu">
		                    <?php foreach ($language as $key => $value) {
		                    ?>
		                    <li>
		                      <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/links/<?=$value->min?> "><?=$value->name?> 
		                      </a>
		                    </li>
		                    <?php } ?>
		                  </ul>
		                </div>
		                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal1">Add Menu</button>
						<br><br>
						<table id="menulList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name">Name</th>
						            <th data-field="flag">Page</th>
						            <th data-field="url">Url</th>
						            <th data-field="type">Type</th>
						            <th data-field="state">State</th>
						            <th>Options</th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->name?></td>
									<td><?=$value->page?></td>
									<td><?=$value->url?></td>
									<td><?=$value->type?></td>
									<td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
									<td>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/links/<?=$value->idmenu?>" class="text-success"><i class="fa fa-pencil "></i> Edit</a>&nbsp;&nbsp;
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/menu/<?=$value->idmenu?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Delete</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

		</div>	
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create New Link/menu</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//menu/_form', 
			array(
					'model'=>$model,
					'page'=>$page,
					'block'=>$block,
					'language'=>$language,
					'lang'=>$lang
				)
			); 
		?>
      </div>
    </div>
</div>




<script type="text/javascript">
	
	window.onload = function(){ 

		setTimeout(function(){
			var beans=new Beans();
	        beans.generate_data_table('menulList');
	        
	        var select_type=function(){

				if ($('select#type_page option#scroll_page').is(':selected')) {
					$('#url_page').show();
					$('#Menu_url').val("/"+$("#url_page option:selected").text());
				}else{
					$('#url_page').hide();
					$('#Menu_url').val("/"+$("#page_name option:selected").text());
				}
			}

			select_type();

			$("select#type_page").on('change',function(){
				select_type();
			});

			$("select#page_name").on('change',function(){
				if (!$('select#type_page option#scroll_page').is(':selected')) {
					$('#Menu_url').val("/"+$("#page_name option:selected").text());
				}
				
			});

			$("select#url_page").on('change',function(){
				if ($('select#type_page option#scroll_page').is(':selected')) {
					$('#Menu_url').val("/"+$("#url_page option:selected").text());
				}
				
			});
		
	    },200);
	};
	
</script>
