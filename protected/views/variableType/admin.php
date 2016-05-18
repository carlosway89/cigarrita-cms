<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.posts.config.variable')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
		                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal1"><?=Yii::t('app','panel.posts.config.variable.create')?></button>
		                <br><br><br>
		                <?php 
		                	if (isset($_GET["message"])) {
								echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
							}
		                ?>
						<table id="postList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="header"><?=Yii::t('app','panel.posts.config.variable.name')?></th>
						            <th><?=Yii::t('app','panel.table.options')?></th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->value?></td>
									<td>
										<?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                          				?>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/variableType/edit/<?=$value->idtype?>/<?=$id?>" class="text-success"><i class="fa fa-pencil "></i> <?=Yii::t('app','panel.edit')?></a>&nbsp;
										<?php }
										if (Yii::app()->user->checkAccess("webmaster")) {
											?>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/variableType/<?=$value->idtype?>/<?=$id?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> <?=Yii::t('app','panel.delete')?></a>
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
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="height: 350px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel"><?=Yii::t('app','panel.posts.config.variable.create')?></h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//variableType/_form', 
			array(
					'model'=>$model,
					'message'=>$message,
					'id'=>$id
				)
			); 
		?>
      </div>
    </div>
</div>