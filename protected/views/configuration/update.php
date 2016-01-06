<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Web Configuraciones</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<?php		
							if (isset($_GET['message'])) {
								echo "<h4 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET['message']."</h4><br>";
							}
						?>	
						<div class="form">
							<?php $form=$this->beginWidget('CActiveForm', array(
								'id'=>'configuration-form',
								'enableAjaxValidation'=>false,								
        						'htmlOptions' => array('enctype' => 'multipart/form-data'),
							)); ?>
								<p class="note">Campos con<span class="required">*</span> son requeridos.</p>
								
								<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>
								

								<div class="row">
									<?php echo $form->labelEx($model,'titulo'); ?>
									<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
									<?php echo $form->error($model,'title'); ?>
								</div>

								<div class="row">
									<?php echo $form->labelEx($model,'logo'); ?>
									<img class="img-responsive" width="100px" src="<?php echo Yii::app()->request->baseUrl."/".$model->logo; ?>">
									<div class="file-field input-field">
								      <input class="file-path validate" type="text" value="<?=$model->logo?>" style="padding-left: 20px;"/>
								      <div class="btn blue lighten-1">
								        <span>Logo</span>
								        <input type="file" name="Configuration[logo]" value="<?=$model->logo?>"/>
								      </div>
								    </div>
							
									<?php echo $form->error($model,'logo'); ?>
								</div>

								<div class="row">
									<?php echo $form->labelEx($model,'descripcion'); ?>
									<?php echo $form->textField($model,'description',array('size'=>60,'length'=>'120','maxlength'=>400,'class'=>'counter_char')); ?>
									<?php echo $form->error($model,'description'); ?>
								</div>
								<?php if (Yii::app()->user->checkAccess("webmaster")) {
								?>
								<div class="row">
									<?php echo $form->labelEx($model,'idioma por defecto'); ?>
									<select name="Configuration[language]" class="browser-default">
									<?php foreach ($language as $key => $value) {
									?>
									<option <?=$model->language==$value->min?'selected':''?> value="<?=$value->min?>" ><?=$value->name?></option>
									<?php
									}?>
									</select>
									<?php echo $form->error($model,'language'); ?>
								</div>
								<?php } ?>

								<div class="row">
									<?php echo $form->labelEx($model,'Google Analytic ID'); ?>
									<?php echo $form->textField($model,'analytic_id',array('size'=>60,'maxlength'=>100)); ?>
									<?php echo $form->error($model,'analytic_id'); ?>
								</div>
								<div class="row">
									<?php echo $form->labelEx($model,'keywords'); ?>
									<?php echo $form->textField($model,'keywords',array('length'=>200,'class'=>'counter_char')); ?>
									<?php echo $form->error($model,'keywords'); ?>
								</div>
								<?php if (Yii::app()->user->checkAccess("webmaster")) {
								?>
								<div class="row">
									<?php echo $form->labelEx($model,'id_facebook_page'); ?>
									<?php echo $form->textField($model,'id_facebook_page'); ?>
									<?php echo $form->error($model,'id_facebook_page'); ?>
								</div>
								<?php } ?>

								<div class="row buttons">
									<button type="submit" class="btn btn-info">Actualizar</button>
								</div>
							<?php $this->endWidget(); ?>

						</div>

					</div>
				</div>
		</div>
	</div>
</div>
<script type="text/javascript">
		function message() {
            setTimeout(function(){
            	document.getElementById("message_updated").remove();
			},3000);
        }
        window.onload = message;		
</script>
