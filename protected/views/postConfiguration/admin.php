<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.posts.config')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php echo $this->renderPartial('//postConfiguration/_form', 
							array(
									'model'=>$model,
									'config'=>$config,
									'list'=>$list,
									'message'=>$message
								)
							); 
						?>
					</div>
				</div>

		</div>	
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1000 !important;width: 80%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel"><?=Yii::t('app','panel.posts.create')?></h4>
      </div>
      <div class="modal-body">
       
      </div>
    </div>
</div>
