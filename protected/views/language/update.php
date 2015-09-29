
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Language</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php echo $this->renderPartial('//language/_form', 
							array(
									'model'=>$model,
									'flags'=>$flags,
									'message'=>$message
								)
							); 
						?>
					</div>
				</div>

		</div>	
	</div>
</div>

