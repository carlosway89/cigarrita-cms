
<?php

	// print_r($attr);

	if (isset($message)) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$message."</h6><br>";
	}

	if (isset($lang)) {
		$model->language=$lang;
	}
?>	

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?=Yii::t('app','panel.required')?></p>
	<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'categoria'); ?>
		<select name="Post[category]" class="browser-default">
		<?php foreach ($category as $val_cat) {
		 ?>			 
		 	<option <?=$model->category==$val_cat->category?'selected':''?> value="<?=$val_cat->category?>"><?=$val_cat->category?></option>	 
		<?php	
		}?>
		</select>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cabecera'); ?>
		<?php echo $form->textField($model,'header',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'header'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Parrafo'); ?>
		<textarea  class="froala-editor" name="Post[subheader]"><?=$model->subheader?></textarea>
		<?php //echo $form->textField($model,'subheader',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'subheader'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Recurso'); ?>
		<textarea  class="froala-editor-inline" name="Post[source]"><?=$model->isNewRecord?'<img style="width:200px" src="/assets/editor/images/default-image.jpg" alt="default image">':$model->source?></textarea>
		<?php echo $form->error($model,'source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idioma'); ?>
		<select name="Post[language]" class="browser-default">
		<?php foreach ($language as $key => $value) {
		?>
		<option <?=$model->language==$value->min?'selected':''?> value="<?=$value->min?>" ><?=$value->name?></option>
		<?php
		}?>
		</select>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<div class="switch">
          <label>
            Off
            <input name="Post[state]" <?=$model->state?'checked="1"':''?> type="checkbox">
            <span class="lever"></span>
            On
          </label>
        </div>
		<?php echo $form->error($model,'state'); ?>
	</div>
	<div id="attributes_post">
		<?php echo $this->renderPartial('//post/attributes', array('attr'=>$attr,'model'=>$model)); ?>
	</div>

	<div class="row buttons">
		<button class="btn btn-info" type="submit">Guardar</button>
		<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/posts">Regresar</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	
	window.onload = function(){ 
		$('.add-new-attr').on('click',function(event){

			var html_attr=$('.attributes_inputs').html();

			$( '<div class="col-sm-12 attributes_inputs">'+html_attr+'</div>').insertAfter(".attributes_inputs:last-child");
			
			setTimeout(function(){
				$('.attributes_inputs:last-child').find('.add-new-attr').hide();
				$('.delete-new-attr').on('click',function(event){
					$(event.currentTarget).parent().parent().remove();
				});
			},100)
		});
		
		
	};
	
</script>