<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=yii::t('app','panel.blocks')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<div class="dropdown"  style="float:left">
		                  <a data-toggle="dropdown" class="dropdown-toggle btn grey lighten-1" href="#"><?=Yii::t('app','panel.posts.language')?> <span class="caret"></span></a>
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
		                <?php if($lang!=Configuration::model()->findByPk(1)->language){ ?>
			                <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/syncLanguage/block/<?=$lang?>" class="btn-link col-sm-2" style="padding: 8px;text-align: center;"><i class="fa fa-random"></i> <?=Yii::t('app','panel.language.sync')?></a>
			                <?php 
			            	}else{
			            		echo "&nbsp;&nbsp;&nbsp;";
			            	}
                        ?>
                        
		                <br><br><br>
						<table id="postList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name"><?=yii::t('app','panel.table.header')?></th>
						            <!-- <th data-field="flag">Subheader</th> -->
						            <th data-field="flag"><?=yii::t('app','panel.table.category')?></th>
						            <th data-field="state"><?=yii::t('app','panel.table.state')?></th>
						            <th><?=yii::t('app','panel.table.options')?></th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->header?></td>
									<td><?=$value->category?></td>
									<td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?Yii::t('app','panel.table.state.on'):Yii::t('app','panel.table.state.off')?></td>
									
									<td>
										<?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                          				?>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/blocks/<?=$value->idblock?>" class="text-success"><i class="fa fa-pencil "></i> <?=Yii::t('app','panel.edit')?></a>&nbsp;
										<?php }
										if (Yii::app()->user->checkAccess("webmaster")) {
											?>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/block/<?=$value->idblock?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> <?=Yii::t('app','panel.delete')?></a>
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

