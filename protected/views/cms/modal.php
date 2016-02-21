<div id="modal_post" class="ui small modal_cw" style="width: 900px;margin-left: -450px;">
  <i class="close icon closing">&#x2716;</i>
  <div class="header">
    <?=Yii::t('app','editor.modal.details')?> 
  </div>
  <div class="content">
    <div class="description">
   		<div class="alert alert-success post" style="display:none">
			<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> Your Operation was Successfully 
		</div> 
      <div class="container">
        <div class="col-xs-12">
          <ul style="" class="list-inline selector-list-images element-sortable">
            <li class="sort-item" data-item-sortable="{{list_post.idpost}}" ng-repeat="list_post in block_posts.posts">
              <a ng-click="set_external_model(list_post)" ng-class="list_post.idpost==posting.idpost?'active':''">
                <img ng-src="{{list_post.source}}" />
              </a>
            </li>            
          </ul>

        </div>
      </div>     
      <div id='save_post' class='form-horizontal'>
        <div class='form-group'>
          
          

          <div class='uploader-wrapper'>  
            <label for='image' class='col-sm-2 control-label'><?=Yii::t('app','editor.modal.image')?> </label>            
            <div class="new_modal_uploading col-sm-9" style="">
              <div id="fileinput_modal_media" class="fileinput fileinput-new" data-name="image" image-upload image-model="block" image-attribute="background">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px; display:block !important">
                  <img id="background_file" ng-src="{{posting.source}}" ng-show="posting.source?true:false" alt="Select New Image">
                </div>
                <!-- <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                </div> -->
                <div>
                  <span class="btn btn-default btn-file">
                    <span class="fileinput-new"><?=Yii::t('app','editor.modal.image.upload')?></span>
                    <span class="fileinput-exists"><?=Yii::t('app','editor.modal.image.change')?></span>
                    <input id="input" type="file" name="image" ng-model="posting.source">
                </span>
                  <!-- <a href="javascript:;;"  class="btn btn-default"  ng-show="posting.source?true:false">Remove</a> -->
                </div>
              </div>
            </div>  
            
          </div>

                   
            <div class='col-sm-offset-2 col-sm-9'>
                <input style='height: 50px !important;' type="text" class='form-control form-values post' id='header' placeholder='<?=Yii::t('app','editor.modal.header')?>' ng-model="posting.header"></input>
            </div>
        </div>
        
        <div class='form-group'>
          <label for='subheader' class='col-sm-2 control-label'><?=Yii::t('app','editor.modal.subheader')?></label>
          <div class='col-sm-9'>
           <!--             
            <span data-wysiwyg='posting.subheader' data-wysiwyg-toolbar='toolbar' data-ng-model='posting.subheader'></span>
           -->
            <textarea class='fr-view' froalamodal ng-model="posting.subheader"></textarea>
           <!--<summernote ng-model="text_subheader" config="options" editable="editable" editor="editor"></summernote>
             <textarea bootstrap-summer class='form-control form-values post' id='subheader' placeholder='Enter Sub Header' ng-model="posting.subheader" ></textarea> -->
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
            <button id="save_external" type='button' ng-click="save_external(posting,$event)" class='btn btn-primary saving'><?=Yii::t('app','editor.buttons.save')?></button>
            <button id='close_modal' type='button' class='btn btn-default closing' style='margin-left:20px'><?=Yii::t('app','editor.buttons.close')?></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>	