<div id="modal_post" class="ui small modal_cw">
  <i class="close icon closing">&#x2716;</i>
  <div class="header">
    Detalles
  </div>
  <div class="content">
    <div class="description">
   		<div class="alert alert-success post" style="display:none">
			<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> Your Operation was Successfully 
		</div>      
      <div id='save_post' class='form-horizontal'>
        <div class='form-group'>
          <!--
          <label for='header' class='col-sm-2 control-label'></label>
          
          <div class='col-sm-5'>
              <textarea style='height: 200px !important;' class='form-control form-values post' id='header' placeholder='Enter Header' ng-model="posting.header"></textarea>
          </div>
          -->
          <div class='col-sm-12'>  
            <label for='image' class='col-sm-2 control-label'>Imagen <small>(max: 2Mb)</small></label>            
            <div class="new_modal_uploading" style="">
              <div id="fileinput_modal_media" class="fileinput fileinput-new" data-name="image" image-upload image-model="block" image-attribute="background">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px; display:block !important">
                  <img id="background_file" ng-src="{{posting.source}}" ng-show="posting.source?true:false" alt="Select New Image">
                </div>
                <!-- <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                </div> -->
                <div>
                  <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Subir imagen</span>
                    <span class="fileinput-exists">Cambiar</span>
                    <input id="input" type="file" name="image" ng-model="posting.source">
                </span>
                  <!-- <a href="javascript:;;"  class="btn btn-default"  ng-show="posting.source?true:false">Remove</a> -->
                </div>
              </div>
            </div>  
            
          </div>
        </div>
        
        <div class='form-group'>
          <label for='subheader' class='col-sm-2 control-label'>Parrafo</label>
          <div class='col-sm-9'>
           <!-- 
            <ul id='toolbar' style="" class="wysihtml5-toolbar list-inline list-unstyled">
              <li class="dropdown">
                <a class="btn btn-reset dropdown-toggle  btn-sm btn-default" data-toggle="dropdown" href="#">
                  <i class="glyphicon glyphicon-font"></i>&nbsp;
                  <span class="current-font">Normal text</span>&nbsp;
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="" unselectable="on" href="javascript:;" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="div" tabindex="-1">Normal text</a>
                  </li>
                  <li>
                    <a class="wysihtml5-command-active" unselectable="on" href="javascript:;" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" tabindex="-1">Heading 1</a>
                  </li>
                  <li>
                    <a class="" unselectable="on" href="javascript:;" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" tabindex="-1">Heading 2</a>
                  </li>
                  <li>
                    <a unselectable="on" href="javascript:;" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3" tabindex="-1">Heading 3</a>
                  </li>
                  <li>
                    <a unselectable="on" href="javascript:;" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4">Heading 4</a>
                  </li>
                  <li>
                    <a unselectable="on" href="javascript:;" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h5">Heading 5</a>
                  </li>
                  <li>
                    <a unselectable="on" href="javascript:;" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h6">Heading 6</a>
                  </li>
                </ul>
              </li>
              <li>
                <div class="btn-group">
                  <a class="btn btn-reset  btn-sm btn-default"  data-wysihtml5-command="bold">bold</a>
                  <a unselectable="on" href="javascript:;" class="btn btn-reset  btn-sm btn-default" data-wysihtml5-command="italic" title="CTRL+I" tabindex="-1">Italic</a>
                  <a unselectable="on" href="javascript:;" class="btn btn-reset  btn-sm btn-default" data-wysihtml5-command="underline" title="CTRL+U" tabindex="-1">Underline</a>
                </div>
              </li>
              <li>
                <div class="btn-group">
                  <a unselectable="on" href="javascript:;" class="btn btn-reset  btn-sm btn-default" data-wysihtml5-command="insertUnorderedList" title="Unordered list" tabindex="-1"><i class="glyphicon glyphicon-list"></i></a>
                  <a unselectable="on" href="javascript:;" class="btn btn-reset  btn-sm btn-default" data-wysihtml5-command="insertOrderedList" title="Ordered list" tabindex="-1"><i class="glyphicon glyphicon-th-list"></i></a>
                  <a unselectable="on" href="javascript:;" class="btn btn-reset  btn-sm btn-default" data-wysihtml5-command="Outdent" title="Outdent" tabindex="-1"><i class="glyphicon glyphicon-indent-right"></i></a>
                  <a unselectable="on" href="javascript:;" class="btn btn-reset  btn-sm btn-default" data-wysihtml5-command="Indent" title="Indent" tabindex="-1"><i class="glyphicon glyphicon-indent-left"></i></a>
                </div>
              </li>
              <li>
                <div class="btn-group">
                  <a unselectable="on" href="javascript:;" class="btn btn-reset  btn-sm btn-default" data-wysihtml5-action="change_view" title="Edit HTML" tabindex="-1"><i class="glyphicon glyphicon-pencil"></i></a>
                </div>
              </li>
              
            </ul>
            <span data-wysiwyg='posting.subheader' data-wysiwyg-toolbar='toolbar' data-ng-model='posting.subheader'></span>
           -->
           <summernote ng-model="text_subheader" config="options" editable="editable" editor="editor"></summernote>
            <!-- <textarea bootstrap-summer class='form-control form-values post' id='subheader' placeholder='Enter Sub Header' ng-model="posting.subheader" ></textarea> -->
          </div>
        </div>
        <!-- <div class="form-group">
          <label for='estado' class='col-sm-2 control-label'>State</label>
          <div class='col-sm-9'>
            <div id="post_togle" class="ui toggle checkbox" style="margin-top: 8px;" check-select="posting" check-attribute="estado">
              <input id="estado" class="form-values post" type="checkbox" ng-model="posting.state">
              <label style="line-height: 0.2em;">Deactive / Active</label>
            </div>
          </div>
        </div> -->
        <div class='form-group'>
          <div class='col-sm-offset-2 col-sm-10'>
          	<div class="alert alert-success post" style="display:none">
      				<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> Your Operation was Successfully 
      			</div>
            <button id="save_external" type='button' ng-click="save_external(posting,$event)" class='btn btn-primary saving'>Guardar</button>
            <button id='close_modal' type='button' class='btn btn-default closing' style='margin-left:20px'>Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>	