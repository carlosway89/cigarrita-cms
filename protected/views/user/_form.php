<?php		
	if (isset($message)) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$message."</h6><br>";
	}
?>	
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contraseña'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">

			<?php echo $form->labelEx($model,'estado'); ?>
			<div class="switch">
              <label>
                Off
                <input name="User[estado]" <?=$model->estado?'checked="1"':''?> type="checkbox">
                <span class="lever"></span>
                On
              </label>
            </div>
			<?php echo $form->error($model,'estado'); ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_completo'); ?>
		<?php echo $form->textField($model,'full_name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'full_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>


	<div class="row buttons">
			<button class="btn btn-info" type="submit">Guardar</button>
			<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/users">Regresar</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->