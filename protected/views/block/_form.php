
<?php		
	if (isset($message)) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$message."</h6><br>";
	}

?>	

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'block-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<select id="url_page"  class="browser-default" name="Block[category]">
			<?php foreach ($list_category as $key => $value) {?>
			<option value="<?=$value->category?>" ><?=$value->category?></option>
			<?php }?>
		</select>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'header'); ?>
		<?php echo $form->textField($model,'header',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'header'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subheader'); ?>
		<?php echo $form->textField($model,'subheader',array('rows'=>6, 'cols'=>50,'class'=>'summernote textarea-materialize')); ?>
		<?php echo $form->error($model,'subheader'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<div class="switch">
          <label>
            Off
            <input name="Block[state]" <?=$model->state?'checked="1"':''?> type="checkbox">
            <span class="lever"></span>
            On
          </label>
        </div>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<input type="hidden" name="page_id" id="page_id" />
		<input type="hidden" name="Block[language]" value="<?=$lang?>" />
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textField($model,'source',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'source'); ?>
	</div>

	<div class="row buttons">
		<button class="btn btn-info" type="submit">Save</button>
		<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/pages">Back</a>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->