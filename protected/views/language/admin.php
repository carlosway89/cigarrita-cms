<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Manage Languages</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_language">Add Language</button>
						<br><br>
						<table id="langList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name">Name</th>
						            <th data-field="flag">Flag</th>
						            <th data-field="state">State</th>
						            <th>Options</th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->name?></td>
									<td><i class="flag-icon-<?=$value->flag?> flag-icon"></i></td>
									<td><i class="fa fa-circle <?=$value->estado?'text-success':'text-warning'?>"></i> <?=$value->estado?'Enable':'Disable'?></td>
									<td>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/language/<?=$value->idlanguage?>" class="text-success"><i class="fa fa-pencil "></i> Edit</a>&nbsp;&nbsp;
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/language/<?=$value->idlanguage?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Delete</a>
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
        <h4 class="modal-title" id="myModalLabel">Create New Language</h4>
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
