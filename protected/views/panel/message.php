<div class="container-fluid embed-panel">
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
									<td style="width:20%"><?=substr($value->subject, 0, 30)."..."?></td>
									<td><?=$value->date?></td>
									<td><?=$value->country_name?></td>
									<td><span class="text-warning"><?=$value->state?></span></td>
									<td>
										
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/messages/<?=$value->idform?>" class="text-info"><i class="fa fa-eye "></i> See</a>&nbsp;&nbsp;
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/form/<?=$value->idform?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Delete</a>
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

