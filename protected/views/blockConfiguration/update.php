<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.posts')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php echo $this->renderPartial('//blockConfiguration/_form', 
							array(
									'model'=>$model,
									'message'=>$message,
									'category'=>$category,
									'idblock'=>$idblock
								)
							); 
						?>
					</div>
				</div>

		</div>	
	</div>
</div>
