<?php		
	if (isset($_GET["message"]) && !$model->isNewRecord) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
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
		<?php echo $form->labelEx($model,Yii::t('app','panel.users.user')); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('app','panel.users.password')); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<?php if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
    ?>	
	<div class="row">
			<?php echo $form->labelEx($model,Yii::t('app','panel.table.state')); ?>
			<div class="switch">
              <label>
                Off
                <input name="User[estado]" <?=$model->estado?'checked="1"':''?> type="checkbox">
                <span class="lever"></span>
                On
              </label>
            </div>
			<?php echo $form->error($model,'estado'); ?>
		</div>
	<?php }?>
	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('app','panel.users.name')); ?>
		<?php echo $form->textField($model,'full_name',array('required'=>'required','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'full_name'); ?>
	</div>
	<?php if(Yii::app()->user->checkAccess("webmaster")) {
		$user_type="";
		foreach ($model->auth as $value_auth) {
			$user_type=$value_auth->itemname;
		}
	?>
	<div class="row">
		<label for=""><?=Yii::t('app','panel.users.type')?></label>
		<select name="user_type" class="browser-default" required>
			<option value=""><?=Yii::t('app','panel.none')?></option>
			<?php foreach ($users_groups as $users_groups_val) {				
			?>
			<option <?=$user_type==$users_groups_val->name?"selected":""?> value="<?=$users_groups_val->name?>"><?=$users_groups_val->name?></option>
			<?php }?>
		</select>
	</div>
	<?php }?>
	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('app','panel.users.email')); ?>
		<?php echo $form->textField($model,'email',array('required'=>'required','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>


	<div class="row buttons">
			<button class="btn btn-info" type="submit"><?=Yii::t('app','panel.save')?></button>
			<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/users"><?=Yii::t('app','panel.back')?></a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->