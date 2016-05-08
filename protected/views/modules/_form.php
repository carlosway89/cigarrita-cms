<?php

	if (isset($_GET["message"]) && !$model->isNewRecord) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
	}

?>	


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modules-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?=Yii::t('app','panel.required')?></p>
	<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('required'=>'required','size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<ul role="tablist" class="nav nav-tabs" id="myTab">
          <li class="active"><a data-toggle="tab" role="tab" href="#yii_code">PHP Yii Code</a></li>
          <li class=""><a data-toggle="tab" role="tab" href="#angular_code">Angular JS code</a></li>  
        </ul>
		<div class="tab-content" id="myTabContent">
			<div id="yii_code" class="tab-pane tabs-up fade panel panel-default active in">
                <div class="panel-body">
                	<textarea id="codemirror" class="codemirror-editor" name="php_code"><?=htmlspecialchars($source->php_source)?></textarea>
                </div>
            </div>
            <div id="angular_code" class="tab-pane tabs-up fade panel panel-default">
                <div class="panel-body">
                	<textarea id="codemirror2" class="codemirror-editor" name="js_code"><?=htmlspecialchars($source->js_source)?></textarea>
                </div>
            </div>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('app','panel.table.state')); ?>
		<div class="switch">
          <label>
            Off
            <input name="Modules[state]" <?=$model->state?'checked="1"':''?> type="checkbox">
            <span class="lever"></span>
            On
          </label>
        </div>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row buttons">
		<button class="btn btn-info" type="submit"><?=Yii::t('app','panel.save')?></button>
		<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/modules/"><?=Yii::t('app','panel.back')?></a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->