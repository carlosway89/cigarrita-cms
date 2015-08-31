
<div class="container-fluid embed-page">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Manage Users</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<table id="userList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name">Email</th>
						            <th data-field="flag">User</th>
						            <th data-field="state">Full Name</th>
						            <th data-field="state">State</th>
						            <th>Options</th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($model as $key => $value) {
								?>
								<tr>
									<td><?=$value->email?></td>
									<td><?=$value->username?></td>
									<td><?=$value->full_name?></td>
									<td><i class="fa fa-circle <?=$value->estado?'text-success':'text-warning'?>"></i> <?=$value->estado?'Enable':'Disable'?></td>
									<td>
										<a href="#" class="text-info"><i class="fa fa-pencil "></i> Edit</a>&nbsp;&nbsp;
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

<script type="text/javascript">
	
	window.onload = function(){ 

		setTimeout(function(){
			var beans=new Beans();
	        beans.generate_data_table('userList');
	        
	    },200);
	};
	
</script>
