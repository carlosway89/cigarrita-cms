<?php
/* @var $this PostConfigurationController */
/* @var $config PostConfiguration */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-configuration-form',
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
	            <input name="PostConfiguration[has_source]" <?=$config->has_source?'checked="1"':''?> type="checkbox">
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
			<select name="PostConfiguration[type_source]" class="browser-default" required>
				<option <?=$config->type_source=="image"?'selected':''?> value="image">Image</option>
				<option <?=$config->type_source=="gallery"?'selected':''?> value="gallery">Gallery / slider</option>
				<option <?=$config->type_source=="video"?'selected':''?> value="video">Video</option>
				<option <?=$config->type_source=="embed"?'selected':''?> value="embed">Embed HTML</option>
				<option <?=$config->type_source=="file"?'selected':''?> value="file">File</option>
			</select>
			<?php echo $form->error($config,'type_source'); ?>
		</div>
		<div class="col-xs-2">
			<?php echo $form->labelEx($config,'max_width'); ?>
			<input value="<?=$config->max_width?>" min="0" name="PostConfiguration[max_width]"  type="number" required>
			
			<?php echo $form->error($config,'max_width'); ?>
		</div>
		<div class="col-xs-2">
			<?php echo $form->labelEx($config,'max_height'); ?>
			<input value="<?=$config->max_height?>" min="0" name="PostConfiguration[max_height]"  type="number" required>
			

			<?php echo $form->error($config,'max_height'); ?>
		</div>
		<div class="col-xs-2">
			<?php echo $form->labelEx($config,'quality'); ?>
			<input value="<?=$config->quality?>"  min="0" max="100" name="PostConfiguration[quality]"  type="number" required>
			

			<?php echo $form->error($config,'quality'); ?>
		</div>
		<div class="col-xs-2">
			<?php echo $form->labelEx($config,'crop'); ?>
			<div class="switch" style="line-height: 42px;">
	          <label>
	            Off
	            <input name="PostConfiguration[crop]" <?=$config->crop?'checked="1"':''?> type="checkbox">
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
	            <input name="PostConfiguration[has_header]" <?=$config->has_header?'checked="1"':''?> type="checkbox">
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
	            <input name="PostConfiguration[has_subheader]" <?=$config->has_subheader?'checked="1"':''?> type="checkbox">
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
	            <input name="PostConfiguration[has_teaser]" <?=$config->has_teaser?'checked="1"':''?> type="checkbox">
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
	<div class="row">

		<table id="postList" class="hoverable centered">
			<thead>
				<tr>
		            <th data-field="value"><?=Yii::t('app','panel.table.header')?></th>
		            <th data-field="type"><?=Yii::t('app','panel.table.category')?></th>
		            <th><?=Yii::t('app','panel.table.options')?></th>
		        </tr>
			</thead>
			<tbody>
				<?php foreach ($list as $key => $value) {
				?>
				<tr>
					<td>
						<input type="hidden" name="Variable[idvariable][]" value="<?=$value->idvariable?>" disabled="disabled" />
						<input type="text" name="Variable[value][]" value="<?=$value->value?>"  style="width: 250px;height: 40px;margin-left: auto;margin-right: auto;" disabled="disabled" /></td>
					<td>
						<?php
						
							$types_list=array(
								"input" =>"input", 
								"textarea" =>"textarea", 
								"select" =>"select", 
								"multi" =>"multi-select", 
							);

						?>
						<select name="Variable[type][]" class="browser-default text-center" style="width: 180px;height: 40px;margin-left: auto;margin-right: auto;" disabled="disabled">
							<option value="">--type--</option>
							<?php
								foreach ($types_list as $types_key => $types_val) {						
							?>
								<option <?=$value->type==$types_key?"selected='selected'":""?> value="<?=$types_key?>"><?=$types_val?></option>
							<?php }?>
						</select>
					</td>
					<td>
						<?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
          				?>
          				<?php if ($value->type=="select" || $value->type=="multi") {
						?>
          				<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/variableType/<?=$value->idvariable?>" class="text-info" target="_blank"><i class="fa fa-plus"></i> <?=Yii::t('app','panel.posts.attributes.new')?></a>&nbsp;&nbsp;
						<?php } ?>
						<a id="<?=$value->idvariable?>" href="javascript:;;" class="edit-variable-type text-success"><i class="fa fa-pencil "></i> <?=Yii::t('app','panel.edit')?></a>&nbsp;
						
						<?php }
						if (Yii::app()->user->checkAccess("webmaster")) {
							?>
						<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/variable/<?=$value->idvariable?>/<?=$config->category?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> <?=Yii::t('app','panel.delete')?></a>
						<?php }?>
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td>
						<input type="hidden" name="Variable[idvariable][]" value="0">
						<input name="Variable[value][]" placeholder="attribute name" style="width: 250px;height: 40px;margin-left: auto;margin-right: auto;"  type="text" >
					</td>
					<td>
						<select name="Variable[type][]" class="browser-default text-center" style="width: 180px;height: 40px;margin-left: auto;margin-right: auto;">
							<option selected value="input">input</option>
							<option value="textarea">textarea</option>
							<option value="select">select</option>
							<option value="multi">multi-select</option>
						</select>
					</td>
					<td>&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<!--<a href="javascript:;;" data-toggle="modal" data-target="#modal1" class="btn btn-default pull-right" style="font-size: 10px;line-height: 27px;height: 30px;"><i class="fa fa-plus" style="font-size: 10px;"></i>  Agregar nuevo</a>-->
	</div>

	<div class="row buttons">
		<button class="btn btn-info" type="submit"><?=Yii::t('app','panel.save')?></button>
		<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/posts/<?=$config->category?>"><?=Yii::t('app','panel.back')?></a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">

	window.onload = function(){ 
		$(".edit-variable-type").on("click",function(){
			$(this).parent().parent().find("input").removeAttr("disabled");
			$(this).parent().parent().find("select").removeAttr("disabled");
			$(this).parent().parent().find("input[type='text']").focus();
		});
	}
</script>
