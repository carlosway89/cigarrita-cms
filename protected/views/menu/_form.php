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

		<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

		<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'nombre'); ?>
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>

		<?php if (Yii::app()->user->checkAccess("webmaster")) {
        ?>
		<div class="row">
			<?php echo $form->labelEx($model,'url'); ?>
			<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100,'readonly'=>true)); ?>
			<?php echo $form->error($model,'url'); ?>
		</div>

		

		<div class="row">
			<?php echo $form->labelEx($model,'tipo'); ?>
			<select id="type_page" name="Menu[type]" class="browser-default">
				<option id="scroll_page" value="scroll" <?=$model->type=='scroll'?'selected':''?> >Scroll</option>
				<option id="new_page" value="new" <?=$model->type=='new'?'selected':''?> >Nuevo Tab</option>
			</select>
			<br>
			<select id="url_page"  class="browser-default">
				<?php foreach ($block as $key => $value) {?>
				<option <?=$model->url=='/'.$value->category?'selected':''?> value="<?=$value->category?>" ><?=$value->category?></option>
				<?php }?>
			</select>
			<?php echo $form->error($model,'type'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'pagina'); ?>
			<select id="page_name" name="Menu[page]" class="browser-default">
			<?php foreach ($page as $val_pag) {
			 ?>			 
			 	<option <?=$model->page==$val_pag->idpage?'selected':''?> value="<?=$val_pag->idpage?>"><?=$val_pag->name?></option>	 
			<?php	
			}?>
			</select>
			
			<?php echo $form->error($model,'page'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'Sub menu'); ?>
			<select id="parent_id" name="Menu[parent_id]" class="browser-default">
				<option value="">Ninguno</option>
			<?php foreach ($list as $val_list) {
				if ($val_list->parent_id=="") {
			 ?>			 
			 	<option <?=$model->parent_id==$val_list->idmenu?'selected':''?> value="<?=$val_list->idmenu?>"><?=$val_list->name?></option>	 
			<?php }	
			}?>
			</select>
			
			<?php echo $form->error($model,'parent_id'); ?>
		</div>

		

		<div class="row">
			<?php echo $form->labelEx($model,'idioma'); ?>
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
			<?php echo $form->labelEx($model,'recurso'); ?>
			<?php echo $form->textField($model,'source',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'source'); ?>
		</div>
		<?php }?>
		<div class="row">

			<?php echo $form->labelEx($model,'estado'); ?>
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
			<button class="btn btn-info" type="submit">Guardar</button>
			<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/links">Regresar</a>
		</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->

<script type="text/javascript">
	
	window.onload = function(){ 

		console.log('loaded');
		var select_type=function(){

			if ($('select#type_page option#scroll_page').is(':selected')) {
				$('#url_page').show();
				$('#Menu_url').val("/"+$("#url_page option:selected").text());
			}else{
				$('#url_page').hide();
				$('#Menu_url').val("/"+$("#page_name option:selected").text());
			}
		}

		select_type();

		$("select#type_page").on('change',function(){
			select_type();
		});

		$("select#page_name").on('change',function(){
			if (!$('select#type_page option#scroll_page').is(':selected')) {
				$('#Menu_url').val("/"+$("#page_name option:selected").text());
			}
			
		});

		$("select#url_page").on('change',function(){
			if ($('select#type_page option#scroll_page').is(':selected')) {
				$('#Menu_url').val("/"+$("#url_page option:selected").text());
			}
			
		});
		
	};
	
</script>
