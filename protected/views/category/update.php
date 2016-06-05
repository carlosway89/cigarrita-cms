
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.category.update')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php echo $this->renderPartial('//category/_form', 
							array(
									'model'=>$model,
									'category_updater'=>true,
								)
							); 
						?>
					</div>
				</div>

		</div>	
	</div>
</div>
