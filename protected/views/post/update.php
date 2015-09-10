<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Menu/Links</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php echo $this->renderPartial('//post/_form', 
							array(
									'model'=>$model,
									'message'=>$message,
									'category'=>$category,
									'language'=>$language,
								)
							); 
						?>
					</div>
				</div>

		</div>	
	</div>
</div>
