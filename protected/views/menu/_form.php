<?php		
	if (isset($_GET["message"]) && !$model->isNewRecord) {
		echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
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

		<p class="note"><?=Yii::t('app','panel.required')?></p>
		<?php echo $form->errorSummary($model, '', '', array('class' => 'red-text red lighten-4  alert')); ?>

		<div class="row">
			<?php echo $form->labelEx($model,Yii::t('app','panel.table.name')); ?>
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100,'required'=>'required')); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,Yii::t('app','panel.menus.submenu')); ?>
			<select id="parent_id" name="Menu[parent_id]" class="browser-default">
				<option value=""><?=Yii::t('app','panel.none')?></option>
				<?php foreach ($tree as $value) {
					$value=(object)$value;
					if ($value->hierarchy==0) {				
				?>
				<option <?=$model->parent_id==$value->idmenu?'selected':''?> value="<?=$value->idmenu?>" ><?=$value->name?></option>
				<?php 
					$fnChildren=function($array,$pos,$idparent) use (&$fnChildren,$model){
						foreach ($array as $val_list) {
																										
							$val_list=(object) $val_list;
							$size=($pos)*20;
							$with="width: calc(100% - ".$size."px);";
							$left="margin-left: ".$size."px;";
							$style=$left.$with;
				?>
					<option style="<?=$style?>" <?=$model->parent_id==$val_list->idmenu?'selected':''?> value="<?=$val_list->idmenu?>" >> <?=$val_list->name?></option>
				<?php
							if (isset($val_list->sub_menu)) {
								$i=$pos+1;
								$fnChildren($val_list->sub_menu,$i,$val_list->idmenu);
							}

						}
					};
				?>
				<?php }
					if (isset($value->sub_menu)) {
						$fnChildren($value->sub_menu,1,$value->idmenu);
					}
				}

				?>
			</select>
			
			
			<?php echo $form->error($model,'parent_id'); ?>
		</div>

		<?php if (Yii::app()->user->checkAccess("webmaster") || Yii::app()->user->checkAccess("admin")) {
        ?>		

		<div class="row">
			<?php echo $form->labelEx($model,Yii::t('app','panel.menus.table.type')); ?>
			<select id="type_page" name="Menu[type]" class="browser-default">
				<option id="new_page" value="new" <?=$model->type=='new'?'selected':''?> >Page</option>
				<option id="scroll_page" value="scroll" <?=$model->type=='scroll'?'selected':''?> >Scroll</option>
				<option id="redirect_page" value="redirect" <?=$model->type=='redirect'?'selected':''?> >Redirect</option>
			</select>
			<br>
			<select id="url_page"  class="browser-default">
				<?php foreach ($block as $key => $value) {?>
				<option <?=$model->url=='/'.$value->category?'selected':''?> value="<?=$value->category?>" ><?=$value->category?></option>
				<?php }?>
			</select>
			<?php echo $form->error($model,'type'); ?>
		</div>		
		<div id="page_name" class="row">
			<?php echo $form->labelEx($model,Yii::t('app','panel.menus.table.page')); ?>
			<select  name="Menu[page]" class="browser-default">
			<?php foreach ($page as $val_pag) {
			 ?>			 
			 	<option <?=$model->page==$val_pag->idpage?'selected':''?> value="<?=$val_pag->idpage?>"><?=$val_pag->name?></option>	 
			<?php	
			}?>
			</select>
			
			<?php echo $form->error($model,'page'); ?>
		</div>	
		<div class="row">
			<?php echo $form->labelEx($model,'url'); ?>

			<?php 
				
				if ($model->type=='redirect') {
					echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); 
				}else{
					echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100,'readonly'=>true)); 
				}
				
			?>
			<?php echo $form->error($model,'url'); ?>
		</div>
		

		<div class="row">
			<?php 
			if (!$model->isNewRecord) {
				
				echo $form->labelEx($model,Yii::t('app','panel.menus.language')); ?>
				<select name="Menu[language]" class="browser-default">
				<?php foreach ($language as $key => $value) {
				?>
				<option <?=$model->language==$value->min?'selected':''?> value="<?=$value->min?>" ><?=$value->name?></option>
				<?php
				}?>
				</select>
			<?php 
				echo $form->error($model,'language'); 
			}
			?>
		</div>	

		<div class="row">
			<?php echo $form->labelEx($model,Yii::t('app','panel.posts.source')); ?>
			<?php echo $form->textField($model,'source',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'source'); ?>
		</div>
		<?php }?>
		<div class="row">

			<?php echo $form->labelEx($model,Yii::t('app','panel.table.state')); ?>
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
		<?php if (!$model->isNewRecord) {			
		?>
		<div class="row">		
			<?php echo $form->labelEx($model,'SEO title'); ?>
			<?php echo $form->textField($model,'SEO_title',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'SEO_title'); ?>		
		</div>
		<div class="row">		
			<?php echo $form->labelEx($model,'SEO description'); ?>
			<?php echo $form->textField($model,'SEO_description',array('size'=>100,'maxlength'=>200,'class'=>'counter_char')); ?>
			<?php echo $form->error($model,'SEO_description'); ?>
		
		</div>
		<div class="row">		
			<?php echo $form->labelEx($model,'SEO keywords'); ?>
			<?php echo $form->textField($model,'SEO_keywords',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'SEO_keywords'); ?>		
		</div>
		<?php }?>

		<div class="row buttons">
			<button class="btn btn-info" type="submit"><?=Yii::t('app','panel.save')?></button>
			<a class="btn grey lighten-1" href="<?=Yii::app()->getBaseUrl(true)?>/panel/links/<?=isset($lang)?$lang:$model->language?>"><?=Yii::t('app','panel.back')?></a>
		</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->

<script type="text/javascript">
	
	window.onload = function(){ 

		console.log('loaded');
		var select_type=function(){

			if ($('select#type_page option#scroll_page').is(':selected')) {
				$('#url_page').show();
				$('#page_name').show();
				$('#Menu_url').attr("readonly","readonly");
				$('#Menu_url').val("/"+$("#url_page option:selected").text());
			}else{
				if ($('select#type_page option#new_page').is(':selected')) {
					$('#url_page').hide();
					$('#page_name').show();
					$('#Menu_url').attr("readonly","readonly");
					//$('#Menu_url').val("/"+$("#page_name option:selected").text());
					var menu_name=$("input#Menu_name").val();
					menu_name = menu_name.replace(/\s/g, "-");
					menu_name=menu_name.toLowerCase();
					var sr=["ä","ë","ï","ö","ü","ñ","ß","á","é","í","ó","ú","'",'"',"ç","à","è","ì","ò","ù"];
					var rp=["ae","e","i","oe","ue","nh","ss","a","e","i","o","u","","","c","a","e","i","o","u"];
					for(i=0;i<sr.length;i++){

						menu_name = menu_name.replace(new RegExp(sr[i], 'g'), rp[i]);
					}
					<?php if($model->language==Configuration::model()->findByPk(1)->language){?>
					$('#Menu_url').val("/"+menu_name);
					<?php }?>
				}else{
					$('#url_page').hide();
					$('#page_name').hide();					
					$('#Menu_url').attr("readonly",false);
					$('#Menu_url').val("<?=$model->url?>");
					
				}
				
			}
		}

		select_type();

		$("select#type_page").on('change',function(){
			select_type();
		});
		<?php if($model->language==Configuration::model()->findByPk(1)->language){?>
		$("input#Menu_name").on("keyup",function(event) {
			var that=$(this);
			var menu_name=that.val();
			menu_name = menu_name.replace(/\s/g, "-");
			menu_name=menu_name.toLowerCase();
			var sr=["ä","ë","ï","ö","ü","ñ","ß","á","é","í","ó","ú","'",'"',"ç","à","è","ì","ò","ù"];
			var rp=["ae","e","i","oe","ue","nh","ss","a","e","i","o","u","","","c","a","e","i","o","u"];
			for(i=0;i<sr.length;i++){
				
				menu_name = menu_name.replace(new RegExp(sr[i], 'g'), rp[i]);
			}
			
			if ($('select#type_page option#new_page').is(':selected')) {
				$('#Menu_url').val("/"+menu_name);
			}
			
		});
		<?php }?>

		$("#page_name select").on('change',function(){
			if (!$('select#type_page option#scroll_page').is(':selected')) {
				var menu_name=$("input#Menu_name").val();
				menu_name = menu_name.replace(/\s/g, "-");
				menu_name=menu_name.toLowerCase();
				var sr=["ä","ë","ï","ö","ü","ñ","ß","á","é","í","ó","ú","'",'"',"ç","à","è","ì","ò","ù"];
				var rp=["ae","e","i","oe","ue","nh","ss","a","e","i","o","u","","","c","a","e","i","o","u"];
				for(i=0;i<sr.length;i++){

					menu_name = menu_name.replace(new RegExp(sr[i], 'g'), rp[i]);
				}
				<?php if($model->language==Configuration::model()->findByPk(1)->language){?>
				$('#Menu_url').val("/"+menu_name);
				<?php }?>
			}
			
		});

		$("select#url_page").on('change',function(){
			if ($('select#type_page option#scroll_page').is(':selected')) {
				$('#Menu_url').val("/"+$("#url_page option:selected").text());
			}
			
		});
		
	};
	
</script>
