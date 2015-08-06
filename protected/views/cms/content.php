<h3>Pages</h3>
<p>Pages and Links includes in your website / Change the Selector to manage languages of the page</p>
<div class="row">
	<div id="language_drop" class="ui search selection dropdown pull-left">
		<input id="language_panel_option" name="language" type="hidden" value="{{current_lang}}">					
		<div class="default text">Select Language</div>
		<i class="dropdown icon"></i>
		<div class="menu laguage-select-panel" style="z-index: 1000;" language-select="language"  select-model="language">
			<!--Languages Availables-->
			
		</div>

	</div>
	<a class="middle" href="#/languages"><i class="plus icon"></i> New Language</a>
</div>
<br><br>
<div class="alert alert-success post block" style="display:none">
	<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> Your Operation was Successfully 
</div>
<ul id="sortable_menu" class="list-inline text-center" style="display:block" >

	<li class="ui-state-default" ng-repeat="menu in menu">
		<a id="{{menu.idmenu}}"  href="javascript:;;" ng-click="open_content(menu)" class="block list-content " ng-class="{active: isActive(menu.estado),desactive: !isActive(menu.estado)}">
			<i class="laptop icon huge"></i>
			<br>
			<label class="">{{menu.name}}</label>
		</a>
		<div class="options-menu">
			<a href="javascript:;;" class="text-success"><i class="fa fa-arrows"></i></a>	
			<a href="javascript:;;" class="text-danger" ng-if='webmaster' ng-click="remove_content(menu)"><i class="trash icon"></i></a>
		</div>		
	</li>
	<li class="enabled-sortable" ng-if='webmaster'>
		<a id="new" ng-click="open_content()" href="javascript:;;" class="block list-content plus-gray text-info" >
			<i class="plus icon huge"></i>
			<br>
			<label class="">New Page</label>
		</a>		
	</li>

</ul>

<div class="row content-details"   style="display:none">

	<hr>
	<div class="col-md-12">
		<div class="col-md-6 col-form-content">
			<!-- <h3></h3>
			<br> -->
			<h5>The input with (<small class="text-danger">*</small>) are required </h5>

			<form id='save_form_content' class='form-horizontal' role='form' enctype="multipart/form-data">
			  <div class='form-group'>
			    <label for='name' class='col-sm-2 control-label'>Name<span class="text-danger">*</span></label>
			    <div class='col-sm-9'>
			      <!-- <input type='hidden' class='form-control form-values' id='idcontent' ng-model="content.content.idcontent" >	
			      <input type='hidden' class='form-control form-values' id='idmenu' ng-model="content.idmenu" > -->
			      <input type='text' class='form-control form-values' id='name' placeholder='Enter Name' ng-model="content.name" required>
			    </div>
			  </div>
			  <!-- #if content.webmaster_user -->
			  <div class='form-group' ng-if='content.user_admin'>
			    <label for='url' class='col-sm-2 control-label'>URL<span class="text-danger">*</span></label>
			    <div class='col-sm-9'>
			      <input type='text' class='form-control form-values' id='url' placeholder='Enter URL' ng-model="content.url" required>
			    </div>
			  </div>
			  <div class='form-group' ng-if='content.user_admin'>
			    <label for='url' class='col-sm-2 control-label'>Minimal</label>
			    <div class='col-sm-9'>
			        <div id="content_toogle_minimal" class="ui toggle checkbox" style="margin-top: 8px;" check-select="content" check-attribute="minimal">
					    <input id="minimal" class="form-values" name="public" type="checkbox">
					    <label style="line-height: 0.2em;">Deactive / Active</label>
					</div>
			    </div>
			  </div>
			  <div class='form-group' ng-if='content.user_admin'>
			    <label for='template' class='col-sm-2 control-label'>Template<span class="text-danger">*</span></label>
			    <div class='col-sm-9'>
			    	<input type='text' class='form-control form-values' id='template' placeholder='Template' ng-model="block.template" required>			    	
			    </div>
			  </div>
			  <!-- /if -->
			  <div class='form-group'>
			    <label for='background' class='col-sm-2 control-label'>Image</label>
			    <div class='col-sm-9'>
			    	<!-- <input type='hidden' class='form-control form-values' id='background_image' ng-model="content.content.background" > -->
			    	    		
		    		<div class="new-uploading" style="">
		    			<div id="fileinput_media" class="fileinput fileinput-new" data-name="background">
						  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;display:block !important">
						    <img id="background_file" src="{{block.background}}" alt="Select New Image">
						  </div>
						  <!-- <div class="fileinput-preview fileinput-exists thumbnail" ng-show="block.background?true:false" style="max-width: 200px; max-height: 150px;">
						  </div> -->
						  <div>
						    <span class="btn btn-default btn-file">
						    	<span class="fileinput-new">Upload image</span>
						    	<span class="fileinput-exists">Change</span>
							    <input id="background_input" type="file" name="background" ng-model="block.background" >
							</span>
						    <a href="javascript:;;"  class="btn btn-default" ng-click="remove_image(block)" ng-show="block.background?true:false">Remove</a>
						  </div>
						</div>
		    		</div>		    	
			    </div>
			  </div>

			  <div class='form-group'>
			    <label for='header' class='col-sm-2 control-label'>Header</label>
			    <div class='col-sm-9'>
			    	<textarea class='form-control form-values' id='header' placeholder='Enter Header' ng-model="block.header"></textarea>
			    </div>
			  </div>
			  <div class='form-group'>
			    <label for='subheader' class='col-sm-2 control-label'>Sub Header</label>
			    <div class='col-sm-9'>
			    	<div bootstrap-summer class='form-control form-values' id='subheader' placeholder='Enter Sub Header' ></div>
			    </div>
			  </div>
			  <div class="form-group">
			  	<label for='estado' class='col-sm-2 control-label'>State</label>
			  	<div class='col-sm-9'>
				  	<div id="content_toogle_estado" class="ui toggle checkbox" style="margin-top: 8px;" check-select="content" check-attribute="estado">
					    <input id="estado" class="form-values" name="public" type="checkbox" ng-model="content.estado">
					    <label style="line-height: 0.2em;">Deactive / Active</label>
					</div>
				</div>
			  </div>
			  <div class='form-group'>
			    <div class='col-sm-offset-2 col-sm-10'>
			    	<div class="alert alert-success block" style="display:none">
						<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> Your Operation was Successfully 
					</div>
			      <button id="save_content" type='button' ng-click="save_content(content,block)" class='btn btn-primary'>Save Content</button>
			       <button id='close' type='button' class='btn btn-default' style='margin-left:20px' ng-click="close_content()">Close</button>
			    </div>
			  </div>
			</form>
			
		</div>

		<div class="col-md-6">

			<a id="nuevo" ng-click="open_post()" ng-if="block.idcontent?true:false" href="javascript:;;" class="block list-post margin-top:40px" >
				<i class="plus icon huge"></i>
				<br>
				<label class="">New Post</label>
			</a>
			
			<br>
			<ul class="list-inline post-ul text-center" style="display:block;">
				<!-- #each this.post -->
				<li ng-repeat="post in block.post">
					<a id="idpost" ng-click="open_post(post)" href="javascript:;;" class="block list-post" ng-class="{active: isActive(post.estado),desactive: !isActive(post.estado)}">
						<i class="pencil icon huge"></i>
						<br>
						<img ng-src="{{post.image}}" ng-if="post.image?true:false" class="img-responsive">
						<!-- <label class="short-text">{{post.header}}</label> -->
						<p class="short-text">{{post.subheader}}</p>
					</a>
				</li>
				<!-- /each -->
				
			</ul>

		</div>
	</div>
	<!-- Modal -->

	<div class="">
		<div id="modal_post" class="ui small modal">
		  <i class="close icon closing"></i>
		  <div class="header">
		    Post Detail
		  </div>
		  <div class="content">
		    <div class="description">
		   		<div class="alert alert-success post" style="display:none">
					<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> Your Operation was Successfully 
				</div>      
		      <form id='save_post' class='form-horizontal' role='form'>
		        <div class='form-group'>
		          <!-- <label for='background' class='col-sm-2 control-label'>Background</label> -->
		          <!-- <div class='col-sm-9'>
		            <input type='hidden' class='form-control form-values post' id='idcontent' ng-model="post.idcontent" > 
		            <input type='hidden' class='form-control form-values post' id='idpost' ng-model="post.idpost" > 
		          </div> -->
		        </div>
		        <div class='form-group'>
		          <label for='link' class='col-sm-2 control-label'>Link</label>
		          <div class='col-sm-9'>
		            <input type='text' class='form-control form-values post' id='link' placeholder='Enter URL Link' ng-model="post.link" required>
		          </div>
		        </div>
		        <div class='form-group'>
		          <label for='image' class='col-sm-2 control-label'>Image</label>
		          <div class='col-sm-9'>
		            
		            <!-- <input type='hidden' class='form-control form-values post' id='background_image' ng-model="post.image" > -->
		                      
		            <div class="new_modal_uploading" style="">
		              <div id="fileinput_modal_media" class="fileinput fileinput-new" data-name="image">
		                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px; display:block !important">
		                  <img id="background_file" ng-src="{{post.image}}" alt="Select New Image">
		                </div>
		                <!-- <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
		                </div> -->
		                <div>
		                  <span class="btn btn-default btn-file">
		                    <span class="fileinput-new">Upload image</span>
		                    <span class="fileinput-exists">Change</span>
		                    <input id="background_modal_input" type="file" name="image" ng-model="post.image">
		                </span>
		                  <a href="javascript:;;"  class="btn btn-default" ng-click="remove_image(post)" ng-show="post.image?true:false">Remove</a>
		                </div>
		              </div>
		            </div>  
		            
		          </div>
		        </div>
		        <div class='form-group'>
		          <label for='header' class='col-sm-2 control-label'>Header</label>
		          <div class='col-sm-9'>
		            <textarea class='form-control form-values post' id='header' placeholder='Enter Header' ng-model="post.header"></textarea>
		          </div>
		        </div>
		        <div class='form-group'>
		          <label for='subheader' class='col-sm-2 control-label'>Sub Header</label>
		          <div class='col-sm-9'>
		            <textarea bootstrap-summer class='form-control form-values post' id='subheader' placeholder='Enter Sub Header' ng-model="post.subheader" ></textarea>
		          </div>
		        </div>
		        <div class='form-group'>
		          <label for='class' class='col-sm-2 control-label'>Class</label>
		          <div class='col-sm-9'>
		            <input type='text' class='form-control form-values post' id='class' placeholder='Enter Class' ng-model="post.class">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for='estado' class='col-sm-2 control-label'>State</label>
		          <div class='col-sm-9'>
		            <div id="post_togle" class="ui toggle checkbox" style="margin-top: 8px;" check-select="post" check-attribute="estado">
		              <input id="estado" class="form-values post" type="checkbox" ng-model="post.estado">
		              <label style="line-height: 0.2em;">Deactive / Active</label>
		            </div>
		          </div>
		        </div>
		        <div class='form-group'>
		          <div class='col-sm-offset-2 col-sm-10'>
		          	<div class="alert alert-success post" style="display:none">
						<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> Your Operation was Successfully 
					</div>
		            <button id="save_post" type='button' ng-click="save_post(post,block)" class='post btn btn-primary'>Save Content</button>
		            <button id='close_modal' type='button' class='btn btn-default closing' style='margin-left:20px'>Close</button>
		          </div>
		        </div>
		      </form>
		    </div>
		  </div>
		</div>	
	</div>

	<!--end modal-->


</div>