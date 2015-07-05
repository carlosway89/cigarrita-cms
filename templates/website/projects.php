<div class="ui four column doubling page grid page-content  page-gray " style="padding-top:20px;min-height: 560px;">
	<div class="row">
		<h1 id="header"  data-object="content" class="font-huge text-center no-margin">{{menus.content[0].header}}s</h1>
		<h2 id="subheader"  data-object="content" class="font-huge text-center"><small>{{menus.content[0].subheader}}</small></h2>
	</div>
	<div class="row">
		<div id="carousel-slider" class="carousel slide" data-ride="carousel" >
		  <!-- Indicators -->
		  
		  <div class="col-md-12 ">
		  	<div class="row carousel-indicators" role="tablist">
		  		<!-- {{#each this.post_list}} -->
		  		<div class="col-xs-3 pointer " ng-class="{active : $first, item : true}" data-target="#carousel-slider" data-slide-to="{{$index}}" ng-repeat="post in menus.content[0].post">
		  			<i class="{{post.class}} huge icon no-margin"></i>
		  		</div>
		  		<!-- {{/each}} -->
		  	</div>
		  </div>


		  <i class="store-showcase background-tabbed-nav-separator"></i>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner ui page grid margin-top" role="listbox" >

		  	<!-- {{#each this.post_list}} -->
		    <div class="item " ng-repeat="post in menus.content[0].post" ng-class="{active : $first, item : true}">
		    	<div class="">	
		    		<div class="col-md-12 block"  data-object="post">
		    			<div class="col-md-9 ipad-ground">
		    				<img src="{{post.image}}" class="img-responsive" alt="cigarrita-worker">
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