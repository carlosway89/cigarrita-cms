
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre de categoria  *'); ?>
		<?php echo $form->textField($model,'category',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tag'); ?>
		<?php echo $form->textField($model,'tag',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tag'); ?>
	</div>

	<div class="row buttons">
		<button class="btn btn-info" type="submit">Guardar</button>
		<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/pages">Regresar</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->