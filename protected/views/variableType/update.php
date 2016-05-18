<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.posts.config.variable')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php 
							echo $this->renderPartial('//variableType/_form', 
							array(
									'model'=>$model,
									'message'=>$message,
									'id'=>$id,
								)
							); 
						?>
					</div>
				</div>

		</div>	
	</div>
</div>
