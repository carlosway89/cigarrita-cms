<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.users')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                        ?>
						<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal1"><?=Yii::t('app','panel.users.create')?></button>
						<br><br>
						<?php }?>
						<?php 
						if (isset($_GET["message"]) && !$model->isNewRecord) {
							echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
						}
						?>
						<table id="userList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="email"><?=Yii::t('app','panel.users.email')?></th>
						            <th data-field="user"><?=Yii::t('app','panel.users.user')?></th>
						            <th data-field="name"><?=Yii::t('app','panel.users.name')?></th>
						            <th data-field="type"><?=Yii::t('app','panel.users.type')?></th>
						            <th data-field="state"><?=Yii::t('app','panel.table.state')?></th>
						            <th><?=Yii::t('app','panel.table.options')?></th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->email?></td>
									<td><?=$value->username?></td>

									<td><?=$value->full_name?></td>
									<td>
									<?php 
										foreach ($value->auth as $value_auth) {
											echo $value_auth->itemname;
										}
									?>
									</td>
									<td><i class="fa fa-circle <?=$value->estado?'text-success':'text-warning'?>"></i> <?=$value->estado?Yii::t('app','panel.table.state.on'):Yii::t('app','panel.table.state.off')?></td>
									<td>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/users/<?=$value->iduser?>" class="text-info"><i class="fa fa-pencil "></i> <?=Yii::t('app','panel.edit')?></a>&nbsp;&nbsp;
										<?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                          				?>										
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/user/<?=$value->iduser?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> <?=Yii::t('app','panel.delete')?></a>
										<?php }?>
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
        <h4 class="modal-title" id="myModalLabel"><?=Yii::t('app','panel.users.create')?></h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//user/_form', 
			array(
					'model'=>$model,
					'users_groups'=>$users_groups
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
	        beans.generate_data_table('userList');
	        
	    },200);
	};
	
</script>
