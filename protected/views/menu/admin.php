<style type="text/css">
  		#sortable{
  			cursor:move;
  		}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Manejar Menu/Links</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">

						<div class="row">
							<div class="dropdown col-sm-2">
			                  <a data-toggle="dropdown" class="dropdown-toggle btn grey lighten-1" href="#">Idiomas <span class="caret"></span></a>
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
			                <?php if (Yii::app()->user->checkAccess("webmaster")) {
                          	?>
			                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal1">Agregar Menu</button>
							<?php }?>
							<br><br>
						</div>
						
						
						 
		                <div class="row">
		                	<div class="col-sm-12">
		                		<table id="" class="hoverable centered">
									<thead>
										<tr>
								            <th data-field="name">Nombre</th>
								            <th data-field="flag">Pagina</th>
								            <th data-field="url">Url</th>
								            <th data-field="type">Tipo</th>
								            <th data-field="state">Estado</th>
								            <th>Opciones</th>
								        </tr>
									</thead>
									<tbody id="sortable">
										<?php foreach ($list as $key => $value) {
										?>
										<tr id="<?=$value->idmenu?>" class="ui-state-default">
											<td><?=$value->name?></td>
											<td><?=$value->page?></td>
											<td><?=$value->url?></td>
											<td><?=$value->type?></td>
											<td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
											<td>
												<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/links/<?=$value->idmenu?>" class="text-success"><i class="fa fa-pencil "></i> Editar</a>&nbsp;&nbsp;
												<?php if (Yii::app()->user->checkAccess("webmaster")) {
                          						?>
												<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/menu/<?=$value->idmenu?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Eliminar</a>
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
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Link/menu</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//menu/_form', 
			array(
					'model'=>$model,
					'list'=>$list,
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

			    setTimeout(function(){
			    	$( "#sortable" ).sortable({
			    		items: "tr:not(.enabled-sortable)",
						cursor: "move",
						// handle:".text-success",
						start:function(event, ui){
					        startPosition = ui.item.prevAll().length;
					        // console.log(startPosition);
					    },
					    update: function(event, ui) {
					        endPosition = ui.item.prevAll().length;
					        var json={};
				        	$("#sortable .ui-state-default").each(function(index){
				        		json[index+1]=$(this).attr('id');			   
					        });
				        	var serverUrl="<?php echo Yii::app()->request->baseUrl; ?>/api/menuSort";

				        	json=JSON.stringify(json);

					        $.ajax({
		                        type: "POST",
		                        url: serverUrl,
		                        data: json,
		                        contentType: 'application/json; charset=utf-8',	 
		                        dataType: "json",              
		                        success: function(data) {

		                        }
		                    });
					        
					    }
			    	});
    				// $( "#sortable" ).disableSelection();
			    },1000);

			        
		
	    },200);
	};
	
</script>
