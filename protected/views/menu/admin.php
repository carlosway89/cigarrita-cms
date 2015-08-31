<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Manage Menu/Links</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<a href="" class="btn btn-info">Add Menu</a>
						<br><br>
						<table id="menulList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name">Name</th>
						            <th data-field="flag">Page</th>
						            <th data-field="name">Url</th>
						            <th data-field="name">Type</th>
						            <th data-field="state">State</th>
						            <th>Options</th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($model as $key => $value) {
								?>
								<tr>
									<td><?=$value->name?></td>
									<td><?=$value->page?></td>
									<td><?=$value->url?></td>
									<td><?=$value->type?></td>
									<td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
									<td>
										<a href="#" class="text-success"><i class="fa fa-pencil "></i> Edit</a>&nbsp;&nbsp;
										<a href="#"><i class="fa fa-eye text-info"></i> Change State</a>&nbsp;&nbsp;
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
	        beans.generate_data_table('menulList');
	        
	    },200);
	};
	
</script>