<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Manejar Usuarios</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal1">Nuevo Usuario</button>
						<br><br>
						<table id="userList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="name">Email</th>
						            <th data-field="flag">Usuario</th>
						            <th data-field="state">Nombre</th>
						            <th data-field="state">Tipo</th>
						            <th data-field="state">Estado</th>
						            <th>Opciones</th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->email?></td>
									<td><?=$value->username?></td>

									<td><?=$value->full_name?></td>
									<td>
									<?php 
										foreach ($value->auth as $value_auth) {
											echo $value_auth->itemname;
										}
									?>
									</td>
									<td><i class="fa fa-circle <?=$value->estado?'text-success':'text-warning'?>"></i> <?=$value->estado?'Enable':'Disable'?></td>
									<td>
										<?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
                          				?>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/users/<?=$value->iduser?>" class="text-info"><i class="fa fa-pencil "></i> Editar</a>&nbsp;&nbsp;
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/user/<?=$value->iduser?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Eliminar</a>
										<?php }?>
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
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//user/_form', 
			array(
					'model'=>$model
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
	        beans.generate_data_table('userList');
	        
	    },200);
	};
	
</script>
