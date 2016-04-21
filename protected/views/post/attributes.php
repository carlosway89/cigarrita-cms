<div class="row">
	<label class="active" for="Post_header">Atributos externos</label>
	<?php foreach ($attr as $key => $value) {
	?>
	<div class="col-sm-12 attributes_inputs" style="margin-top: 15px;">
		<div class="col-sm-offset-1 col-sm-3">
			<input rows="6" cols="50" name="Attr[idattributes][]" id="Post_header"  type="hidden" value="<?=$value['idattributes']?>" >
			<input rows="6" cols="50" name="Attr[idpost][]" id="Post_header"  type="hidden" value="<?=$value['idpost']?>" >
			
			<strong style="line-height: 35px;">hola:</strong>
			
		</div>
		<div class="col-sm-6">
			<select name="Attr[value][]" class="browser-default  chosen-select" data-placeholder="Elegir" required>
					<option></option>
					<?php 
						$subcategory=array("1" =>"holavalue" , "2" =>"holavalue2" );
						foreach ($subcategory as $key => $value) {
					?>
						<option value="name"><?=$value?></option>
					<?php
						}
					?>
			</select>
		</div>
		
	</div>
	<?php }?>
	
</div>
