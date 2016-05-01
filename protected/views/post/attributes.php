<div class="row">
	<label class="active" for="Post_header">Atributos externos</label>
	<?php 
	foreach ($variables as $val) {
	?>
	<div class="col-sm-12 attributes_inputs" style="margin-top: 15px;">
		<div class="col-sm-offset-1 col-sm-3">
			<?php
			$idattr=0;
			$valattr="";
			foreach ($attr as $attr_v) {
				if ($attr_v["key"]==$val->idvariable) {
					$idattr=$attr_v["idattributes"];
					$valattr=$attr_v["value"];
					break;
				}
			}
			?>
			<input rows="6" cols="50" name="Attr[idattributes][]"  type="hidden" value="<?=$idattr?>" >
			<input rows="6" cols="50" name="Attr[idpost][]"   type="hidden" value="<?=$model->idpost?>" >
			<input type="hidden" value="<?=$val->idvariable?>" name="Attr[key][]" >
			<strong style="line-height: 35px;"><?=$val->value?></strong>
			
		</div>
		<div class="col-sm-8">
			<?php 
				if ($val->type=="select" || $val->type=="multi" ) {
			?>
			<select name="Attr[value][]" class="browser-default  chosen-select" data-placeholder="Elegir" >
					<option val=""></option>
					<?php 
						$list_variablestype=VariableType::model()->findAll("idvariable='".$val->idvariable."' and is_deleted='0'");
						
						foreach ($list_variablestype as $key => $value) {
							$is_selected="";
							if ($valattr==$value->value) {
								$is_selected="selected='selected'";
							}
					?>
						<option <?=$is_selected?> value="<?=$value->value?>"><?=$value->value?></option>
					<?php
						}
					?>
			</select>
			&nbsp;&nbsp;
			<a class="btn-link" target="_blank" href="<?=Yii::app()->getBaseUrl(true)?>/panel/variableType/<?=$val->idvariable?>"> + Agregar valores</a>
			<?php		
				}else{								
					if ($val->type=="input") {
			?>
			<input name="Attr[value][]" type="text" style="width:200px" value="<?=$valattr?>" >
			<?php		
					}
				}
			?>
			
		</div>
		
	</div>
	<?php }?>
	
</div>
