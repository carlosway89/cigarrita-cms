<?php
/* @var $this BlockConfigurationController */
/* @var $config BlockConfiguration */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'block-configuration-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?=Yii::t('app','panel.required')?></p>
	<?php echo $form->errorSummary($config, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

	<div class="row">
		<div class="col-xs-12">
			<?php echo $form->labelEx($config,'has_source'); ?>
			<div class="switch">
	          <label>
	            Off
	            <input name="BlockConfiguration[has_source]" <?=$config->has_source?'checked="1"':''?> type="checkbox">
	            <span class="lever"></span>
	            On
	          </label>
	        </div>
			<?php echo $form->error($config,'has_source'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-4">
			<?php echo $form->labelEx($config,''); ?>
			<select name="BlockConfiguration[type_source]" class="browser-default" required>
				<option <?=$config->type_source=="image"?'selected':''?> value="image">Image</option>
				<option <?=$config->type_source=="gallery"?'selected':''?> value="gallery">Gallery / slider</option>
				<option <?=$config->type_source=="background"?'selected':''?> value="background">Background</option>
				<option <?=$config->type_source=="video"?'selected':''?> value="video">Video</option>
				<option <?=$config->type_source=="embed"?'selected':''?> value="embed">Embed HTML</option>
				<option <?=$config->type_source=="file"?'selected':''?> value="file">File</option>
			</select>
			<?php echo $form->error($config,'type_source'); ?>
		</div>
		<div class="col-xs-2">
			<?php echo $form->labelEx($config,'max_width'); ?>
			<input value="<?=$config->max_width?>" min="0" name="BlockConfiguration[max_width]"  type="number" required>
			
			<?php echo $form->error($config,'max_width'); ?>
		</div>
		<div class="col-xs-2">
			<?php echo $form->labelEx($config,'max_height'); ?>
			<input value="<?=$config->max_height?>" min="0" name="BlockConfiguration[max_height]"  type="number" required>
			

			<?php echo $form->error($config,'max_height'); ?>
		</div>
		<div class="col-xs-2">
			<?php echo $form->labelEx($config,'quality'); ?>
			<input value="<?=$config->quality?>"  min="0" max="100" name="BlockConfiguration[quality]"  type="number" required>
			

			<?php echo $form->error($config,'quality'); ?>
		</div>
		<div class="col-xs-2">
			<?php echo $form->labelEx($config,'crop'); ?>
			<div class="switch" style="line-height: 42px;">
	          <label>
	            Off
	            <input name="BlockConfiguration[crop]" <?=$config->crop?'checked="1"':''?> type="checkbox">
	            <span class="lever"></span>
	            On
	          </label>
	        </div>
			<?php echo $form->error($config,'crop'); ?>
		</div>
		
	</div>
	<div class="row">
		
		<div class="col-xs-2">
			<?php echo $form->labelEx($config,'has_header'); ?>
			<div class="switch">
	          <label>
	            Off
	            <input name="BlockConfiguration[has_header]" <?=$config->has_header?'checked="1"':''?> type="checkbox">
	            <span class="lever"></span>
	            On
	          </label>
	        </div>
			<?php echo $form->error($config,'has_header'); ?>
		</div>
		<div class="col-xs-2">
			<?php echo $form->labelEx($config,'has_subheader'); ?>
			<div class="switch">
	          <label>
	            Off
	            <input name="BlockConfiguration[has_subheader]" <?=$config->has_subheader?'checked="1"':''?> type="checkbox">
	            <span class="lever"></span>
	            On
	          </label>
	        </div>
			<?php echo $form->error($config,'has_subheader'); ?>
		</div>
		<div class="col-xs-2">
			<?php echo $form->labelEx($config,'has_teaser'); ?>
			<div class="switch">
	          <label>
	            Off
	            <input name="BlockConfiguration[has_teaser]" <?=$config->has_teaser?'checked="1"':''?> type="checkbox">
	            <span class="lever"></span>
	            On
	          </label>
	        </div>
			<?php echo $form->error($config,'has_teaser'); ?>
		</div>
		
	</div>

	<div class="row">
		<?php echo $form->hiddenField($config,'category',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<button class="btn btn-info" type="submit"><?=Yii::t('app','panel.save')?></button>
		<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/blocks/<?=$config->category?>"><?=Yii::t('app','panel.back')?></a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">

	window.onload = function(){ 
		
	}
</script>
