<style type="text/css">
  		#sortable{
  			cursor:move;
  		}
</style>
<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.menus')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">

						<div class="row">
							<div class="dropdown col-sm-2">
			                  <a data-toggle="dropdown" class="dropdown-toggle btn grey lighten-1" href="#"><?=Yii::t('app','panel.menus.language')?> <span class="caret"></span></a>
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
			                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal1"><?=Yii::t('app','panel.menus.create')?></button>
							<?php }?>
							<br><br>
							<?php 
			                	if (isset($_GET["message"])) {
									echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
								}
			                ?>
						</div>
						
						
						 
		                <div class="row">
		                	<div class="col-sm-12">
		                		<div id="type_table" class="hoverable centered">
									<div class="thead">
								        <div data-field="name"><?=Yii::t('app','panel.table.name')?></div>
								        <div data-field="url"><?=Yii::t('app','panel.menus.table.url')?></div>
								        <div data-field="type"><?=Yii::t('app','panel.menus.table.type')?></div>
								        <div data-field="state"><?=Yii::t('app','panel.table.state')?></div>
								        <div><?=Yii::t('app','panel.table.options')?></div>
									</div>
									<div class="tbody" id="sortable">
										<?php 		


										
									?>
									<?php

										foreach ($tree as $key => $value) {
											$value=(object) $value;
											if ($value->parent_id==0) {
										?>
											<div id="<?=$value->idmenu?>" class="tr ui-state-default">
												<div>
													<?php if (isset($value->sub_menu)) {														
													?>
													<a id="<?=$value->idmenu?>" class="collapse-link" href="javascript:;;"><i class="fa fa-plus"></i></a>													
													<?php }else{ ?>
													<a id="<?=$value->idmenu?>" class="collapse-link" href="javascript:;;"><i class="fa fa-minus"></i></a>
													<?php }?>
													&nbsp;&nbsp;<?=$value->name?>
												</div>
												<div><?=$value->url?></div>
												<div><?=$value->type?></div>
												<div><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?Yii::t('app','panel.table.state.on'):Yii::t('app','panel.table.state.off')?></div>
												<div>
													<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/links/<?=$value->idmenu?>" class="text-success"><i class="fa fa-pencil "></i> <?=Yii::t('app','panel.edit')?></a>&nbsp;&nbsp;
													<?php if (Yii::app()->user->checkAccess("webmaster")) {
	                          						?>
													<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/menu/<?=$value->idmenu?>/<?=$lang?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> <?=Yii::t('app','panel.delete')?></a>
													<?php }?>
												</div>
												<?php
												if (isset($value->sub_menu)) {
													 	$fnChildren($value->sub_menu,1,$value->idmenu);
												}
												?>
											</div>
											<?php 
												
												$fnChildren=function($array,$pos,$idparent) use (&$fnChildren,$lang){
																											
													foreach ($array as $val_list) {
																										
														$val_list=(object) $val_list;
															$size=($pos)*50;
															$with="width: calc(100% - ".$size."px);";
															$left="margin-left: ".$size."px;";
															$style=$left.$with;
															
												?>
														<div id="<?=$val_list->idmenu?>" style="<?=$style?>" class="tr ui-state-default child parent-<?=$idparent?>">
															<div>
															<?php if (isset($val_list->sub_menu)) {					
															?>
																<a id="<?=$val_list->idmenu?>" class="collapse-link" href="javascript:;;"><i class="fa fa-plus"></i></a>																
															<?php }else{ ?>
																<a id="<?=$val_list->idmenu?>" class="collapse-link" href="javascript:;;"><i class="fa fa-minus"></i></a>
															<?php }?>
																<?=$val_list->name?>
															</div>
															<div><?=$val_list->url?></div>
															<div><?=$val_list->type?></div>
															<div><i class="fa fa-circle <?=$val_list->state?'text-success':'text-warning'?>"></i> <?=$val_list->state?Yii::t('app','panel.table.state.on'):Yii::t('app','panel.table.state.off')?></div>
															<div>
																<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/links/<?=$val_list->idmenu?>" class="text-success"><i class="fa fa-pencil "></i> <?=Yii::t('app','panel.edit')?></a>&nbsp;&nbsp;
																<?php if (Yii::app()->user->checkAccess("webmaster")) {
				                          						?>
																<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/menu/<?=$val_list->idmenu?>/<?=$lang?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> <?=Yii::t('app','panel.delete')?></a>
																<?php }?>
															</div>
															<?php 
																if (isset($val_list->sub_menu)) {
																	$i=$pos;
																	$fnChildren($val_list->sub_menu,$i,$val_list->idmenu);
																}
															?>
														</div>
												<?php
														
														
													}
													
											

												};
												
												
												
											}
										} ?>
									</div>
								</div>
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
					'tree'=>$tree,
					'page'=>$page,
					'block'=>$block,
					'language'=>$language,
					'lang'=>$lang,
					'hierarchy'=>$hierarchy
				)
			); 
		?>
      </div>
    </div>
</div>




<script type="text/javascript">
	
	window.onload = function(){ 

		$(".collapse-link").on("click",function(){
			var id=$(this).attr("id");
			if ($(".parent-"+id).is(":visible")) {
				//$(this).nextAll(".child").hide();
				$(".parent-"+id).hide();
				$(this).find("i.fa").removeClass("fa-minus").addClass("fa-plus");
			}else{
				$(".parent-"+id).show();
				$(this).find("i.fa").removeClass("fa-plus").addClass("fa-minus");
			}
			
		});

		setTimeout(function(){
			var beans=new Beans();
	        beans.generate_data_table('menulList');
	        
	        var select_type=function(){

				if ($('select#type_page option#scroll_page').is(':selected')) {
					$('#url_page').show();
					$('#page_name').show();
					$('#Menu_url').attr("readonly","readonly");
					$('#Menu_url').val("/"+$("#url_page option:selected").text());
				}else{
					if ($('select#type_page option#new_page').is(':selected')) {
						$('#url_page').hide();
						$('#page_name').show();
						$('#Menu_url').attr("readonly","readonly");
						$('#Menu_url').val("/"+$("#page_name option:selected").text());
					}else{
						$('#url_page').hide();
						$('#page_name').hide();
						$('#Menu_url').attr("readonly",false);
						$('#Menu_url').val("");
					}
					
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
			    		items: "div.tr:not(.enabled-sortable)",
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
