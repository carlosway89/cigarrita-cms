<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>List Pages</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<table class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name">Name</th>
						            <th data-field="flag">State</th>
						            <th data-field="state">Source</th>
						            <th>Options</th>
						        </tr>
							</thead>
							<tbody id="table-acordion" aria-multiselectable="true">
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->name?></td>
									<td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
									<td><?=substr($value->source, 0, 30)."..."?></td>
									<td>
										<a href="#page-<?=$value->idpage?>" data-toggle="collapse" data-parent="#table-acordion" aria-expanded="false" aria-controls="page-<?=$value->idpage?>"><i class="fa fa-plus "></i> Details</a>&nbsp;
										<?php if (Yii::app()->user->checkAccess("webmaster")) {
										?>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/pages/<?=$value->idpage?>" class="text-success"><i class="fa fa-pencil "></i> Edit</a>&nbsp;
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/page/<?=$value->idpage?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Delete</a>
										<?php }?>
									</td>
								</tr>
								<tr  class="collapse fade" id="page-<?=$value->idpage?>">
									<td colspan="4">
										<div class="row">
											<div class="col-sm-12">
												<?php 
												foreach($value->pageHasBlocks as $key_block => $has_block){
													if (!$has_block->blockIdblock->is_deleted) {
												?>
												<div class="col-sm-1 page-has-block">
													<a class="text-danger delete-link" href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/block/<?=$has_block->blockIdblock->idblock?>"><i class="fa fa-trash-o "></i></a>
													<?=$has_block->blockIdblock->category?>
												</div>
												<?php 
													}
												} ?>
												<a href="#" class="col-sm-1 page-has-block btn-default">
													+Add new
												</a>
											</div>
										</div>
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

