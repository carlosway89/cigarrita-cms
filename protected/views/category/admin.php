<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.category')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
		                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal_category"><?=Yii::t('app','panel.category.create')?></button>
		                <br><br><br>
		                <?php 
		                	if (isset($_GET["message"])) {
								echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
							}
		                ?>
						<table id="categoryList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="header"><?=Yii::t('app','panel.category.name')?></th>
						            <th data-field="type"><?=Yii::t('app','panel.category.type')?></th>
						            <th><?=Yii::t('app','panel.table.options')?></th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->category?></td>
									<td><?=$value->tag?></td>
									<td>
										<?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                          				?>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/category/<?=$value->category?>" class="text-success"><i class="fa fa-pencil "></i> <?=Yii::t('app','panel.edit')?></a>&nbsp;
										<?php }
										?>
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

<!-- Modal Category -->
<div class="modal fade" id="modal_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 10000 !important;width:50%;height: 440px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=Yii::t('app','panel.category.create')?></h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//category/_form', 
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
	        beans.generate_data_table('categoryList');
	        
	    },200);
	    
	};
	
</script>