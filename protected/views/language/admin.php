<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.language.list')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_language"><?=Yii::t('app','panel.language.new')?></button>
						<br><br>
						<table id="langList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name"><?=Yii::t('app','panel.table.name')?></th>
						            <th data-field="flag"><?=Yii::t('app','panel.language.flag')?></th>
						            <th data-field="state"><?=Yii::t('app','panel.table.state')?></th>
						            <th><?=Yii::t('app','panel.table.options')?></th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->name?></td>
									<td><i class="flag-icon-<?=$value->flag?> flag-icon"></i></td>
									<td><i class="fa fa-circle <?=$value->estado?'text-success':'text-warning'?>"></i> <?=$value->estado?Yii::t('app','panel.table.state.on'):Yii::t('app','panel.table.state.off')?></td>
									<td>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/language/<?=$value->idlanguage?>" class="text-success"><i class="fa fa-pencil "></i> <?=Yii::t('app','panel.edit')?></a>&nbsp;&nbsp;
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/language/<?=$value->idlanguage?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> <?=Yii::t('app','panel.delete')?></a>
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
<div class="modal fade" id="modal_language" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Idioma</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//language/_form', 
			array(
					'model'=>$model,
					'flags'=>$flags,
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
	        beans.generate_data_table('langList');

	        
	        if (location.hash) {
		        var tabid = location.hash.substr(1);
		        $('button[data-target="#' + tabid + '"]').trigger('click');
		    }
	        
	    },200);
	};
	
</script>
