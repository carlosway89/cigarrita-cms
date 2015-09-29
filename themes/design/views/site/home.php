
<div id="home" element-block="slider">
	<div class="page-gray" style="">
		<div id="principal_background" style="padding-top:200px;{{block.source}}">
			<!-- {{#each this.posts_list}} -->
			<div  element-object="post" data-type="slider" class="transito container" style="display:none"  element-post>
				<div class="col-md-offset-3 col-md-3">
					<h1 class="no-margin text-principal" element-editable ng-model="post.header">{{post.header}}</h1>					
				</div>
				<div class="col-md-6">
					<img ng-src="<?php echo Yii::app()->request->baseUrl;?>/{{post.source}}" class="img-responsive" alt="cigarrita-worker">
				</div>
				
			</div>

			<!-- {{/each}}	 -->
		</div>
	</div>
</div>

<div id="services" element-block="services" >
	<div class="container page-content  page-white " style="padding-top:20px;min-height: 800px;">
		<br>
		<div class="col-md-12">
			<h1 data-id="header" element-object="block" class="font-huge text-center no-margin" element-contenido >{{block.header}}</h1>
			<h2 data-id="subheader" class="font-huge text-center no-margin" element-object="block" ><small element-contenido>{{block.subheader}}</small></h2>
		</div>
		<br>
		<div class="row" data-id="posts">
			<!-- {{#each this.posts_list}} -->
			<div element-object="post" class="col-md-3 col-sm-3 bottom-20 text-center" element-post >
				
				<img ng-src="<?php echo Yii::app()->request->baseUrl;?>/{{post.source}}" class="img-responsive img-icon">
			  	<h2 element-contenido class="font-large text-icon no-margin">{{post.header}}</h2>
				<p element-contenido class="p-text text-ligth ">{{post.subheader}}</p>
				
			</div>
			
			<!-- {{/each}}	 -->
		</div>
	</div>

</div>
<div id="projects" element-block="projects">

	<div class="ui four column doubling page grid page-content  page-gray " style="padding-top:20px;min-height: 560px;">
		<div class="row">
			<h1 data-id="header"  element-object="block" class="font-huge text-center no-margin"><span element-editable ng-model="block.header">{{block.header}}</span></h1>
			<h2 data-id="subheader" element-object="block" class="font-huge text-center"><small element-editable ng-model="block.subheader"  >{{block.subheader}}</small></h2>
		</div>
		<div class="row">
			<div id="carousel-slider" class="carousel slide" data-ride="carousel" >
			  <!-- Indicators -->
			  
			  <div class="col-md-12 ">
			  	<div class="row carousel-indicators" role="tablist">
			  		<!-- {{#each this.posts_list}} -->
			  		<div class="col-xs-3 pointer " ng-class="{active : $first}" data-target="#carousel-slider" data-slide-to="{{$index}}" element-post>
			  			<i class="{{post.class}} huge icon no-margin"></i>
			  		</div>
			  		<!-- {{/each}} -->
			  	</div>
			  </div>


			  <i class="store-showcase background-tabbed-nav-separator"></i>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner ui page grid margin-top" role="listbox"  >

			  	<!-- {{#each this.posts_list}} -->
			    <div class="item " element-post ng-class="{active : $first}">
			    	<div class="">	
			    		<div class="col-md-12 block"  element-object="post">
			    			<div class="col-md-9 ipad-ground">
			    				<img ng-src="<?php echo Yii::app()->request->baseUrl;?>/{{post.source}}" class="img-responsive" alt="cigarrita-worker">
			    			</div>
			    			<div class="col-md-3">
			    				<h4 element-editable ng-model="post.header">{{post.header}}</h4>
			    				<div element-editable ng-model="post.subheader" ng-bind-html="post.subheader | sanitize"></div>
			    			</div>
			    		</div>	
			    	</div>		    	
			    </div>
			    <!-- {{/each}}	 -->

			  </div>
			</div>
		</div>
	</div>

</div>
<div id="contact" element-block="contact">
	<div class=" page-content page-white " style="padding-top:30px;min-height: 490px;">
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-4">
					<h1 data-id="header" element-object="block" class="font-huge text-center no-margin"><span element-editable ng-model="block.header">{{block.header}}</span></h1>
					<div class="alert alert-success" style="display:none">
						<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> your message was sent
					</div>
					<div data-id="subheader" element-object="block" >
						<span element-editable ng-model="block.subheader"  ng-bind-html="block.subheader | sanitize" element-form></span>
					</div>

				</div>
				<div class="col-md-8">
					<img data-id="background" ng-src="<?php echo Yii::app()->request->baseUrl;?>/{{block.source}}" class="img-responsive" alt="subscribe">
				</div>				
			</div>

		</div>
		<br>
		<!-- {{#each this.posts_list}} -->
		<div class="container" element-object="post" element-post>
			<div class="col-md-12"  >
				<p element-editable ng-model="post.subheader" class="font-large text-light text-center" style="padding-top:10px">{{post.subheader}}</p>
			</div>  
		</div>
		<br>  	
		<!-- {{/each}} -->
	</div>
</div>
<div id="about" element-block="about">

	<div class="page-footer" style="min-height: 390px;">
		<div class="container">
			<div class="row">
				<!-- {{#each this.posts_list}} -->
				<div class="col-md-3" element-object="post" element-post >
					<br>
						<h2 element-editable ng-model="post.header"  class="text-white" >{{post.header}}</h2>
						<p  element-editable ng-model="post.subheader" ng-bind-html="post.subheader | sanitize"></p>
						
					<br>
				</div>
				<!-- {{/each}}	 -->
			</div>
		</div>

		<div class="page-content ">
			<br>
			<div class="container ">
				<div class="ui horizontal list">	
					<div data-id="header"  element-object="block" class="item" ><span ng-model="block.header" element-editable>{{block.header}}</span></div>
				</div>
			</div>
			<br>
		</div>
	</div>
</div>