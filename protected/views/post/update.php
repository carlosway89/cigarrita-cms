<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Post</h4>
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
									'attr'=>$attr,
								)
							); 
						?>
					</div>
				</div>

		</div>	
	</div>
</div>
