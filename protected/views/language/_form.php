<?php		
	if (isset($message)) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$message."</h6><br>";
	}
?>	

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'language-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bandera'); ?>
		<select name="Language[flag]" class="browser-default">
			<?php foreach ($flags as $value) {
			?>
			<option value="<?=$value['name']?>" <?=$model->flag==$value['name']?'selected':''?> > <?=$value['flag']?></option>
			<?php }?>		  
		</select>
		<?php echo $form->error($model,'flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<div class="switch">
          <label>
            Off
            <input name="Language[estado]" <?=$model->estado?'checked="1"':''?> type="checkbox">
            <span class="lever"></span>
            On
          </label>
        </div>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row buttons">
		<button class="btn btn-info" type="submit">Guardar</button>
		<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/language">Regresar</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->