<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Manage Users</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<div class="dropdown col-sm-2">
		                  <a data-toggle="dropdown" class="dropdown-toggle btn grey lighten-1" href="#">Languages <span class="caret"></span></a>
		                  <ul class="dropdown-menu">
		                    <?php foreach ($language as $key => $value) {
		                    ?>
		                    <li>
		                      <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/posts/<?=$value->min?> "><?=$value->name?> 
		                      </a>
		                    </li>
		                    <?php } ?>
		                  </ul>
		                </div>
		                <br><br><br>
						<table id="postList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name">Header</th>
						            <th data-field="flag">Subheader</th>
						            <th data-field="flag">Category</th>
						            <th data-field="state">State</th>
						            <th data-field="state">Date Created</th>
						            <th>Options</th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->header?></td>
									<td><?=substr($value->subheader, 0, 30)."..."?></td>
									<td><?=$value->category?></td>
									<td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
									<td><?=$value->date_created?></td>
									<td>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/posts/<?=$value->idpost?>" class="text-success"><i class="fa fa-pencil "></i> Edit</a>&nbsp;
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/post/<?=$value->idpost?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Delete</a>
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
	        beans.generate_data_table('postList');
	        
	    },200);
	};
	
</script>
