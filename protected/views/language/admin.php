<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Manage Languages</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<a href="" class="btn btn-info">Add Language</a>
						<br><br>
						<table class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name">Name</th>
						            <th data-field="flag">Flag</th>
						            <th data-field="state">State</th>
						            <th>Options</th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($model as $key => $value) {
								?>
								<tr>
									<td><?=$value->name?></td>
									<td><i class="flag-icon-<?=$value->flag?> flag-icon"></i></td>
									<td><i class="fa fa-circle <?=$value->estado?'text-success':'text-warning'?>"></i> <?=$value->estado?'Enable':'Disable'?></td>
									<td>
										<a href="#"><i class="fa fa-eye text-info"></i> Change State</a>&nbsp;&nbsp;
										<a href="#" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Delete</a>
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

