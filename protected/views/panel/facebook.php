<div class="container-fluid ">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Facebook Integration</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<table class="hoverable centered">
							<thead>
								<tr>
						            <th>Options</th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($model as $key => $value) {
								?>
								<tr>
									<td>
										<a href="#" class="text-success"><i class="fa fa-mail-forward "></i> Reply</a>&nbsp;&nbsp;
										<a href="#" class="text-info"><i class="fa fa-eye "></i> See</a>&nbsp;&nbsp;
										<a href="#" class="text-danger"><i class="fa fa-trash-o "></i> Delete</a>
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

