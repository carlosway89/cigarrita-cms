
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Menu/Links</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php echo $this->renderPartial('//menu/_form', 
							array(
									'model'=>$model,
									'list'=>$list,
									'tree'=>$tree,
									'page'=>$page,
									'block'=>$block,
									'language'=>$language,
									'message'=>$message,
									'hierarchy'=>$hierarchy
								)
							); 
						?>
					</div>
				</div>

		</div>	
	</div>
</div>



