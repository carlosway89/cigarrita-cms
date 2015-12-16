<div id="modal_post" class="ui small modal_cw">
  <i class="close icon closing">&#x2716;</i>
  <div class="header">
    Detail
  </div>
  <div class="content">
    <div class="description">
   		<div class="alert alert-success post" style="display:none">
			<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> Your Operation was Successfully 
		</div>      
      <div id='save_post' class='form-horizontal'>
        <div class='form-group'>
          <label for='header' class='col-sm-2 control-label'>Header</label>
          <div class='col-sm-5'>
              <textarea style='height: 200px !important;' class='form-control form-values post' id='header' placeholder='Enter Header' ng-model="posting.header"></textarea>
          </div>
          <div class='col-sm-4'>  
            <label for='image' class='col-sm-12 control-label'>Image <small>(max: 2Mb)</small></label>
            <br>    
            <div class="new_modal_uploading" style="">
              <div id="fileinput_modal_media" class="fileinput fileinput-new" data-name="image" image-upload image-model="block" image-attribute="background">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px; display:block !important">
                  <img id="background_file" ng-src="{{posting.source}}" ng-show="posting.source?true:false" alt="Select New Image">
                </div>
                <!-- <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                </div> -->
                <div>
                  <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Upload image</span>
                    <span class="fileinput-exists">Change</span>
                    <input id="input" type="file" name="image" ng-model="posting.source">
                </span>
                  <!-- <a href="javascript:;;"  class="btn btn-default"  ng-show="posting.source?true:false">Remove</a> -->
                </div>
              </div>
            </div>  
            
          </div>
        </div>
        
        <div class='form-group'>
          <label for='subheader' class='col-sm-2 control-label'>Sub Header</label>
          <div class='col-sm-9'>
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
            <button id="save_external" type='button' ng-click="save_external(posting,$event)" class='btn btn-primary saving'>Save Content</button>
            <button id='close_modal' type='button' class='btn btn-default closing' style='margin-left:20px'>Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>	