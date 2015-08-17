
<div id="home" element-block="slider">
	<div class="page-gray" style="">
		<div id="principal_background" style="padding-top:200px;{{block.source}}">
			<!-- {{#each this.posts_list}} -->
			<div  data-object="post" class="transito container" style="display:none"  element-post>
				<div class="col-md-offset-3 col-md-3">
					<h1 class=" no-margin text-principal">{{post.header}}</h1>					
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
			<h1 data-id="header" data-object="content" class="font-huge text-center no-margin" >{{block.header}}</h1>
			<h2 data-id="subheader" data-object="content" class="font-huge text-center no-margin" ><small>{{block.subheader}}</small></h2>
		</div>
		<br>
		<div class="row" data-id="posts">
			<!-- {{#each this.posts_list}} -->
			<div data-object="post" class="editable col-md-3 col-sm-3 bottom-20 text-center" element-post >
				<div  class="ui raised ">
				  	<h2 class="font-large text-icon no-margin">
				  		<img ng-src="<?php echo Yii::app()->request->baseUrl;?>/{{post.source}}" class="img-responsive img-icon">
				  		{{post.header}}</h2>
					<p class="p-text text-ligth " ng-bind-html="post.subheader | sanitize"></p>
				</div>
			</div>
			<!-- {{/each}}	 -->
		</div>
	</div>

</div>
<div id="projects" element-block="projects">

	<div class="ui four column doubling page grid page-content  page-gray " style="padding-top:20px;min-height: 560px;">
		<div class="row">
			<h1 data-id="header"  data-object="content" class="font-huge text-center no-margin">{{block.header}}s</h1>
			<h2 data-id="subheader"  data-object="content" class="font-huge text-center"><small>{{block.subheader}}</small></h2>
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
			    		<div class="col-md-12 block"  data-object="post">
			    			<div class="col-md-9 ipad-ground">
			    				<img ng-src="<?php echo Yii::app()->request->baseUrl;?>/{{post.source}}" class="img-responsive" alt="cigarrita-worker">
			    			</div>
			    			<div class="col-md-3">
			    				<h4>{{post.header}}</h4>
			    				<div ng-bind-html="post.subheader | sanitize"></div>
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
					<h1 data-id="header"  data-object="content" class="font-huge text-center no-margin">{{block.header}}</h1>
					<div class="alert alert-success" style="display:none">
						<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> your message was sent
					</div>
					<div data-id="subheader"  data-object="content" ng-bind-html="block.subheader | sanitize">
					</div>

				</div>
				<div class="col-md-8">
					<img data-id="background" data-object="content" ng-src="<?php echo Yii::app()->request->baseUrl;?>/{{block.source}}" class="img-responsive" alt="subscribe">
				</div>				
			</div>

		</div>
		<br>
		<!-- {{#each this.posts_list}} -->
		<div class="container" data-object="post" element-post>
			<div class="col-md-12"  >
				<p class="font-large text-light text-center" style="padding-top:10px">{{post.subheader}}</p>
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
				<div class="col-md-3" element-post >
					<br>
						<h2 class="text-white" >{{post.header}}</h2>
						<p  ng-bind-html="post.subheader | sanitize"></p>
						
					<br>
				</div>
				<!-- {{/each}}	 -->
			</div>
		</div>

		<div class="page-content ">
			<br>
			<div class="container ">
				<div class="ui horizontal list">	
					<div data-id="header"  data-object="content" class="item" > {{block.header}}</div>
				</div>
			</div>
			<br>
		</div>
	</div>
</div>