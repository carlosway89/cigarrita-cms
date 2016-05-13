<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.modules.update')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php echo $this->renderPartial('//modules/_form', 
							array(
									'model'=>$model,
									'message'=>$message,
									'source'=>$source
								)
							); 
						?>
					</div>
				</div>

		</div>	
	</div>
</div>