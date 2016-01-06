<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Manejar Blocks</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<div class="dropdown col-sm-2">
		                  <a data-toggle="dropdown" class="dropdown-toggle btn grey lighten-1" href="#">Idiomas <span class="caret"></span></a>
		                  <ul class="dropdown-menu">
		                    <?php foreach ($language as $key => $value) {
		                    ?>
		                    <li>
		                      <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/blocks/<?=$value->min?> "><?=$value->name?> 
		                      </a>
		                    </li>
		                    <?php } ?>
		                  </ul>
		                </div>
		                <br><br><br>
						<table id="postList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name">Cabecera</th>
						            <!-- <th data-field="flag">Subheader</th> -->
						            <th data-field="flag">Categoria</th>
						            <th data-field="state">Estado</th>
						            <th>Opciones</th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->header?></td>
									<td><?=$value->category?></td>
									<td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
									
									<td>
										<?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                          				?>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/blocks/<?=$value->idblock?>" class="text-success"><i class="fa fa-pencil "></i> Editar</a>&nbsp;
										<?php }
										if (Yii::app()->user->checkAccess("webmaster")) {
											?>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/block/<?=$value->idblock?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Eliminar</a>
										<?php }?>
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

<script type="text/javascript">
	
	window.onload = function(){ 

		setTimeout(function(){
			var beans=new Beans();
	        beans.generate_data_table('postList');
	        
	    },200);
	    
	    $('.add-new-attr').on('click',function(event){

			var html_attr=$('.attributes_inputs').html();

			$( '<div class="col-sm-12 attributes_inputs">'+html_attr+'</div>').insertAfter(".attributes_inputs:last-child");
			
			setTimeout(function(){
				$('.attributes_inputs:last-child').find('.add-new-attr').hide();
				$('.delete-new-attr').on('click',function(event){
					$(event.currentTarget).parent().parent().remove();
				});
			},100)
		});
	};
	
</script>

