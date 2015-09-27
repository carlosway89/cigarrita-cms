<div class="row">
	<label class="active" for="Post_header">External Attributes</label>
	<?php foreach ($attr as $key => $value) {
	?>
	<div class="col-sm-12 attributes_inputs">
		<div class="col-sm-2">
			<br>
			<a href="javascript:;;" class="btn-link add-new-attr">
				+add new
			</a>
		</div>
		<div class="col-sm-4">
			<input rows="6" cols="50" name="Attr[idattributes][]" id="Post_header"  type="hidden" value="<?=$value['idattributes']?>" >
			<input rows="6" cols="50" name="Attr[idpost][]" id="Post_header"  type="hidden" value="<?=$value['idpost']?>" >
		
			<input rows="6" cols="50" name="Attr[key][]" id="Post_header" placeholder="@Key" type="text" value="<?=$value['key']?>" >
		</div>
		<div class="col-sm-5">
			<input rows="6" cols="50" name="Attr[value][]" id="Post_header" placeholder="@Value" type="text" value="<?=$value['value']?>" >
		</div>
		<div class="col-sm-1">
			<br>
			<a href="javascript:;;" class="btn-link delete-new-attr text-danger">
				<i class="fa fa-trash-o"></i>
			</a>
		</div>
		
	</div>
	<?php }?>
	
</div>
