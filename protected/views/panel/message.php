<div class="container-fluid ">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>List Messages</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<table id="emailList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name">Email</th>
						            <th data-field="flag">Subject</th>
						            <th data-field="state">Date</th>
						            <th data-field="state">Country</th>
						            <th data-field="state">State</th>
						            <th>Options</th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($model as $key => $value) {
								?>
								<tr>
									<td><?=$value->email?></td>
									<td style="width:20%"><?=$value->subject?></td>
									<td><?=$value->date?></td>
									<td><?=$value->country_name?></td>
									<td><span class="text-info"><?=$value->state?></span></td>
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
<script type="text/javascript">
	
	window.onload = function(){ 

		setTimeout(function(){
			var beans=new Beans();
	        beans.generate_data_table('emailList');
	        
	    },200);
	};
	
</script>

