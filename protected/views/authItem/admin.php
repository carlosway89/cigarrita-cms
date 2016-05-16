<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.usersgroups')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php if (Yii::app()->user->checkAccess("webmaster")) {
                        ?>
						<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal1"><?=Yii::t('app','panel.usersgroups.create')?></button>
						<br><br>
						<?php }?>
						<?php 
						if (isset($_GET["message"]) && !$model->isNewRecord) {
							echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
						}
						?>
						<table id="usergroupsList" class="hoverable centered">
							<thead>
								<tr>						            
						            <th data-field="name"><?=Yii::t('app','panel.usersgroups.name')?></th>
						            <th data-field="description"><?=Yii::t('app','panel.usersgroups.description')?></th>
						            <th><?=Yii::t('app','panel.table.options')?></th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->name?></td>
									<td><?=$value->description?></td>									
									<td>
										
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

		</div>	
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=Yii::t('app','panel.usersgroups.create')?></h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//authItem/_form', 
			array(
					'model'=>$model
				)
			); 
		?>
      </div>
    </div>
</div>

<script type="text/javascript">
	
	window.onload = function(){ 

		setTimeout(function(){
			var beans=new Beans();
	        beans.generate_data_table('usergroupsList');
	        
	    },200);
	};
	
</script>
