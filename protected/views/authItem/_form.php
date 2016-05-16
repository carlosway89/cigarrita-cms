<?php		
	if (isset($_GET["message"]) && !$model->isNewRecord) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
	}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'auth-item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?=Yii::t('app','panel.required')?></p>

	<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>


	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('app','panel.usersgroups.name')." *"); ?>
		<?php echo $form->textField($model,'name',array('required'=>'required','size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('app','panel.usersgroups.description')." *"); ?>
		<?php echo $form->textField($model,'description',array('required'=>'required','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
			<button class="btn btn-info" type="submit"><?=Yii::t('app','panel.save')?></button>
			<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/usersgroups"><?=Yii::t('app','panel.back')?></a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->