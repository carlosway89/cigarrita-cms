<div id="blog" class="page-gray" style="">
	<div id="" class="container">
		<br><br>
		<div class="col-md-3">
			<div class="col-md-12">
				<h2 id="header"  class="font-huge no-margin" >{{blog[0].content[0].header}}</h2>
				<h2 id="subheader" class="font-huge no-margin"><small>{{blog[0].content[0].subheader}}</small></h2>
			</div>
		</div>
		<div class="col-md-9">
			<!-- {{#each this.post_list}} -->
			<div class="col-md-12 div-table" ng-repeat="post in blog[0].content[0].post">
			    <div class=" col-md-4 table-cell">
			      	<img class="img-responsive" ng-src="{{post.image}}">
			    </div>
			    <div class="col-md-8 table-cell">
			      <h4 class="header no-margin">{{post.header}}</h4>
			      <p  ></p>
			      <div class="description" ng-bind-html="post.subheader | sanitize"></div>
			    </div>
			</div>
			<!-- {{/each}} -->
		</div>

	</div>
</div>