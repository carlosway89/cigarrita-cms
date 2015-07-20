<div class=" page-content page-white " style="padding-top:30px;min-height: 490px;">
	<div class="container">
		<div class="col-md-12">
			<div class="col-md-4">
				<h1 id="header"  data-object="content" class="font-huge text-center no-margin">{{menus.content[0].header}}</h1>
				<div class="alert alert-success" style="display:none">
					<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> your message was sent
				</div>
				<div id="subheader"  data-object="content" ng-bind-html="menus.content[0].subheader | sanitize">
				</div>

			</div>
			<div class="col-md-8">
				<img id="background" data-object="content" ng-src="{{menus.content[0].background}}" class="img-responsive" alt="subscribe">
			</div>				
		</div>

	</div>
	<br>
	<!-- {{#each this.post_list}} -->
	<div class="container" data-object="post" ng-repeat="post in menus.content[0].post">
		<div class="col-md-12"  >
			<p class="font-large text-light text-center" style="padding-top:10px">{{post.subheader}}</p>
		</div>  
	</div>
	<br>  	
	<!-- {{/each}} -->
</div>