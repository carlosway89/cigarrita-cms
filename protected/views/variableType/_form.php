<?php


	if (isset($_GET["message"]) && !$model->isNewRecord) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
	}
?>	

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'variable-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?=Yii::t('app','panel.required')?></p>
	<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>


	<div class="row buttons">
		<button class="btn btn-info" type="submit"><?=Yii::t('app','panel.save')?></button>
		<?php 
			$ext_id=Yii::app()->request->getPathInfo();
	        $ext_id = explode("/", $ext_id);
		?>
		<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/variableType/<?=isset($ext_id[4])?$ext_id[4]:$ext_id[2]?>"><?=Yii::t('app','panel.back')?></a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->