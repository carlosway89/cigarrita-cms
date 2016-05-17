
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
	
	<?php if (!isset($edit_block)) {
	?>
	<div id="options_block" style="padding-bottom: 125px;padding-top: 125px;">
		<div class="row">
			<div class="col-sm-6">
				<a href="javascript:;;" id="link_new_block" class="btn btn-default" ><i class="fa fa-plus"></i><br><?=Yii::t('app','panel.blocks.new')?></a>
				
			</div>
			<div class="col-sm-6">
				<a href="javascript:;;" id="link_same_block" class="btn btn-default" ><i class="fa fa-refresh"></i><br><?=Yii::t('app','panel.blocks.new.exists')?></a>
				
			</div>
		</div>
	</div>
	<div id="same_block"  style="display:none;padding-bottom: 95px;padding-top: 90px;">
		<div class="row">
			<select id="model_blocks"  class="browser-default" name="idblock">
				<option value="" selected><?=Yii::t('app','panel.none')?></option>
				<?php foreach ($list_blocks as $val_block) {?>
					
					<option value="<?=$val_block->idblock?>" ><?=$val_block->category?> : <?=$val_block->header?></option>
				<?php }?>
			</select>
			
		</div>
		<div class="row">

			<button class="btn btn-info" type="submit"><?=Yii::t('app','panel.save')?></button>&nbsp;
			<a href="javascript:;;" class="link_return btn btn-default"><?=Yii::t('app','panel.blocks.return')?></a>
		</div>
	</div>
	<?php }?>
	
	<div id="new_block" style="<?=isset($edit_block)?'':'display:none' ?>">
		<p class="note"><?=Yii::t('app','panel.required')?></p>
		<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

		<div class="row">
			<?php echo $form->labelEx($model,yii::t('app','panel.table.category')); ?>
			<select id="url_page"  class="browser-default" name="Block[category]">
				<?php foreach ($list_category as $key => $value) {?>
				<option value="<?=$value->category?>" ><?=$value->category?></option>
				<?php }?>
			</select>
			<?php echo $form->error($model,'category'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,yii::t('app','panel.blocks.cabecera')); ?>
			<?php echo $form->textField($model,'header',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'header'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,yii::t('app','panel.blocks.container')); ?>
			<textarea class="froala-editor" name="Block[subheader]" ><?=$model->subheader?></textarea>
			<?php echo $form->error($model,'subheader'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,Yii::t('app','panel.table.state')); ?>
			<div class="switch">
	          <label>
	            Off
	            <input name="Block[state]" <?=$model->state?'checked="1"':($model->isNewRecord?'checked="1"':'')?> type="checkbox">
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
			<?php echo $form->labelEx($model,yii::t('app','panel.blocks.source')); ?>
			<textarea  class="froala-editor-inline" name="Post[source]"><?=$model->isNewRecord?'<img style="width:200px" src="/assets/editor/images/default-image.jpg" alt="default image">':$model->source?></textarea>
			<?php echo $form->error($model,'source'); ?>
		</div>

		<div class="row buttons">
			<button class="btn btn-info" type="submit"><?=Yii::t('app','panel.save')?></button>&nbsp;
			<?php if (!isset($edit_block)) {
			?>
			<a href="javascript:;;" class="link_return btn btn-default"><?=Yii::t('app','panel.blocks.return')?></a>
			<?php }else{?>
			<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/blocks"><?=Yii::t('app','panel.back')?></a>
			<?php }?>
		</div>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->