<div class="page-gray" style="">
	<div id="principal_background" style="padding-top:200px;{{menus.content[0].subheader}}">
		<!-- {{#each this.post_list}} -->
		<div  data-object="post" class="transito container" style="display:none" ng-class="{active : $first, item : true}" ng-repeat="post in menus.content[0].post">
			<div class="col-md-offset-3 col-md-3">
				<h1 class=" no-margin text-principal">{{post.header}}</h1>					
			</div>
			<div class="col-md-6">
				<img src="{{post.image}}" class="img-responsive" alt="cigarrita-worker">
			</div>
			
		</div>
		<!-- {{/each}}	 -->
	</div>
</div>