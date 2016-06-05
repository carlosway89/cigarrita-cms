<?php		
	if (isset($_GET["message"]) && !$model->isNewRecord) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
	}
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?=Yii::t('app','panel.required')?></p>
	<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('app','panel.category.name')."*"); ?>
		<?php echo $form->textField($model,'category',array('required'=>'required','size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('app','panel.category.type')); ?>
		<select name="Category[tag]" class="browser-default" required>
			<option value=""><?=Yii::t('app','panel.none')?></option>
			<option <?=$model->tag=="panel"?"selected":""?> value="panel">Post</option>
			<option <?=$model->tag=="editor"?"selected":""?> value="editor">Design</option>
		</select>
		<?php echo $form->error($model,'tag'); ?>
	</div>

	<div class="row buttons">
		<button class="btn btn-info" type="submit"><?=Yii::t('app','panel.save')?></button>
		<?php
			if (!$model->isNewRecord && !isset($category_updater)) {
		?>
		<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/pages"><?=Yii::t('app','panel.back')?></a>
		<?php }else{
			if (isset($category_updater)) {
		?>
			<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/category"><?=Yii::t('app','panel.back')?></a>
		<?php		
			}
		?>
		<?php }?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->