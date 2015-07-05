<div class="container page-content  page-white " style="padding-top:20px;min-height: 800px;">
	<br>
	<div class="col-md-12">
		<h1 id="header" data-object="content" class="font-huge text-center no-margin" ng-click="launchit(menus.content[0])" >{{menus.content[0].header}}</h1>
		<h2 id="subheader" data-object="content" class="font-huge text-center no-margin" ng-click="launchit(menus.content[0])" ><small>{{menus.content[0].subheader}}</small></h2>
	</div>
	<br>
	<div class="row">
		<!-- {{#each this.post_list}} -->
		<div data-object="post" class="col-md-3 col-sm-3 bottom-20 text-center" ng-repeat="post in menus.content[0].post" ng-click="launchit(post)">
			<div  class="ui raised ">
			  	<h2 class="font-large text-icon no-margin">
			  		<img src="{{post.image}}" class="img-responsive img-icon">
			  		{{post.header}}</h2>
				<p class="p-text text-ligth " ng-bind-html="post.subheader | sanitize"></p>
			</div>
		</div>
		<!-- {{/each}}	 -->
	</div>
</div>