<?php		
	if (isset($message)) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$message."</h6><br>";
	}

	if (isset($lang)) {
		$model->language=$lang;
	}
?>	
 <div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'menu-form',
		'enableAjaxValidation'=>false,
	)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'url'); ?>
			<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'url'); ?>
		</div>

		

		<div class="row">
			<?php echo $form->labelEx($model,'type'); ?>
			<select id="type_page" name="Menu[type]" class="browser-default">
				<option id="scroll_page" value="scroll" <?=$model->type=='scroll'?'selected':''?> >Scroll To</option>
				<option id="new_page" value="new" <?=$model->type=='new'?'selected':''?> >New Tab</option>
			</select>
			<?php echo $form->error($model,'type'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'page'); ?>
			<select name="Menu[page]" class="browser-default">
			<?php foreach ($page as $val_pag) {
			 ?>			 
			 	<option <?=$model->page==$val_pag->idpage?'selected':''?> value="<?=$val_pag->idpage?>"><?=$val_pag->name?></option>	 
			<?php	
			}?>
			</select>
			
			<?php echo $form->error($model,'page'); ?>
		</div>

		

		<div class="row">
			<?php echo $form->labelEx($model,'language'); ?>
			<select name="Menu[language]" class="browser-default">
			<?php foreach ($language as $key => $value) {
			?>
			<option <?=$model->language==$value->min?'selected':''?> value="<?=$value->min?>" ><?=$value->name?></option>
			<?php
			}?>
			</select>
			<?php echo $form->error($model,'language'); ?>
		</div>

		

		<div class="row">
			<?php echo $form->labelEx($model,'source'); ?>
			<?php echo $form->textField($model,'source',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'source'); ?>
		</div>

		<div class="row">

			<?php echo $form->labelEx($model,'state'); ?>
			<div class="switch">
              <label>
                Off
                <input name="Menu[state]" <?=$model->state?'checked="1"':''?> type="checkbox">
                <span class="lever"></span>
                On
              </label>
            </div>
			<?php echo $form->error($model,'state'); ?>
		</div>

		<div class="row buttons">
			<button class="btn btn-info" type="submit">Save</button>
			<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/links">Back</a>
		</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->