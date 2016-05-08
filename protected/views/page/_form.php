<?php		
	if (isset($message)) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$message."</h6><br>";
	}
?>	
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?=Yii::t('app','panel.required')?></p>

	<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('app','panel.table.name')); ?>
		<?php echo $form->textField($model,'name',array('required'=>'required','size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">

		<?php echo $form->labelEx($model,Yii::t('app','panel.table.state')); ?>
		<div class="switch">
          <label>
            Off
            <input name="Page[state]" <?=$model->state?'checked="1"':''?> type="checkbox">
            <span class="lever"></span>
            On
          </label>
        </div>
		<?php echo $form->error($model,'state'); ?>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<textarea id="codemirror" name="Page[source]" style="height: 360px;overflow-y: scroll;background-color: rgba(0, 0, 0, 0.8);
color: #66AFE9;" ><?=htmlspecialchars($model->source)?></textarea>
		</div>
	</div>
	<div class="row">

		<?php echo $form->labelEx($model,'single_page'); ?>
		<div class="switch">
          <label>
            Off
            <input name="Page[single_page]" <?=$model->single_page?'checked="on"':''?> type="checkbox">
            <span class="lever"></span>
            On
          </label>
        </div>
		<?php echo $form->error($model,'single_page'); ?>
	</div>

	<div class="row buttons">
		<button class="btn btn-info" type="submit"><?=Yii::t('app','panel.save')?></button>
		<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/pages"><?=Yii::t('app','panel.back')?></a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
	
	window.onload = function(){ 

		setTimeout(function(){
				// $('button[data-event="codeview"]').trigger('click');	        
	    },200);
	    
	    
	};
	
</script>