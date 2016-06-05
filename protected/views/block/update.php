
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.blocks.update')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php echo $this->renderPartial('//block/_form', 
							array(
									'model'=>$model,
									'message'=>$message,
									'list_category'=>$category,
									'language'=>$language,
									'list_blocks'=>$list_blocks,
									'lang'=>$lang,
									'edit_block'=>true,
									'block_config'=>$block_config
								)
							); 
						?>
					</div>
				</div>

		</div>	
	</div>
</div>
