
<div class="page-footer" style="min-height: 390px;">
	<div class="container">
		<div class="row">
			<!-- {{#each this.post_list}} -->
			<div class="col-md-3" ng-repeat="post in menus.content[0].post" ng-click="launchit(post)">
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
				<div id="header"  data-object="content" class="item" ng-click="launchit(menus.content[0])"> {{menus.content[0].header}}</div>
			</div>
		</div>
		<br>
	</div>
</div>