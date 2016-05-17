<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.pages.list')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php		
						if (isset($message)) {
							echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$message."</h6><br>";
						}
						?>	
						<?php if (Yii::app()->user->checkAccess("webmaster")) {
										?>
						<button type="button" data-toggle="modal" data-target="#modal_category" class="btn btn-primary"><?=Yii::t('app','panel.category.create')?></button>
						<button type="button" data-toggle="modal" data-target="#modal_page" class="btn "><?=Yii::t('app','panel.pages.new')?></button>
						
						<br><br>
						<?php }?>
						<table class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name"><?=Yii::t('app','panel.table.name')?></th>
						            <th data-field="single"><?=Yii::t('app','panel.pages.single')?></th>
						            <th data-field="state"><?=Yii::t('app','panel.table.state')?></th>						            
						            <th><?=Yii::t('app','panel.table.options')?></th>
						        </tr>
							</thead>
							<tbody id="table-acordion" aria-multiselectable="true">
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->name?></td>
									<td><?=$value->single_page?"YES":"NO"?></td>
									<td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
									
									<td>
										<a href="#page-<?=$value->idpage?>" data-toggle="collapse" data-parent="#table-acordion" aria-expanded="false" aria-controls="page-<?=$value->idpage?>"><i class="fa fa-plus "></i> <?=Yii::t('app','panel.pages.details')?></a>&nbsp;
										<?php if (Yii::app()->user->checkAccess("webmaster")) {
										?>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/pages/<?=$value->idpage?>" class="text-success"><i class="fa fa-pencil "></i> <?=Yii::t('app','panel.edit')?></a>&nbsp;
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/page/<?=$value->idpage?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> <?=Yii::t('app','panel.delete')?></a>
										<?php }?>
									</td>
								</tr>
								<tr  class="collapse fade" id="page-<?=$value->idpage?>">
									<td colspan="4">
										<div class="row">
											<div class="col-sm-12">
												<?php 
												foreach($value->pageHasBlocks as $key_block => $has_block){
													if (!$has_block->is_deleted && !$has_block->blockIdblock->is_deleted ) {
														if ($lang==$has_block->blockIdblock->language) {														
												?>
												<div class="col-sm-1 page-has-block">
													<a class="text-danger delete-link" href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/pageHasBlock/<?=$has_block->id_page_has_block?>"><i class="fa fa-trash-o "></i></a>
													<?=$has_block->blockIdblock->category?>
												</div>
												<?php 
														}
													}
												} ?>
												<button type="button" data-page-id="<?=$value->idpage?>" data-toggle="modal" data-target="#modal_block" class="col-sm-1 page-has-block btn-default new_block_button">
													<?=Yii::t('app','panel.new')?>
												</button>
											</div>
										</div>
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
<!-- Modal Page-->
<div class="modal fade" id="modal_page" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=Yii::t('app','panel.pages.create')?></h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//page/_form', 
			array(
					'model'=>$model
				)
			); 
		?>
      </div>
    </div>
</div>

<!-- Modal Block-->
<div class="modal fade" id="modal_block" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 10000 !important;height: 465px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=Yii::t('app','panel.blocks.create')?></h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//block/_form', 
			array(
					'model'=>$model_block,
					'list_category'=>$list_category,
					'list_blocks'=>$list_blocks,
					'lang'=>$lang
				)
			); 
		?>
      </div>
    </div>
</div>

<!-- Modal Category -->
<div class="modal fade" id="modal_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 10000 !important;height: 440px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=Yii::t('app','panel.category.create')?></h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//category/_form', 
			array(
					'model'=>$model_category
				)
			); 
		?>
      </div>
    </div>
</div>
<script type="text/javascript">
	
	window.onload = function(){
		$('.new_block_button').on('click',function(event){
			var page_id=$(event.currentTarget).attr('data-page-id');
			console.log(page_id);
			$('#page_id').val(page_id);
		});

			
		$('#link_new_block').on('click',function(){
			$('#options_block').hide();
			$('#new_block').show();
		});

		$('#link_same_block').on('click',function(){
			$('#options_block').hide();
			$('#same_block').show();
		});

		$('.link_return').on('click',function(){
			$('#same_block').hide();
			$('#new_block').hide();
			$('#options_block').show();
		});

	}
	
</script>
