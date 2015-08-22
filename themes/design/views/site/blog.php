<div id="blog" class="page-gray" element-block="posts">
	<div id="" class="container">
		<br><br>
		<div class="col-md-3">
			<div class="col-md-12">
				<h2 id="header"  class="font-huge no-margin" >{{block.header}}</h2>
				<h2 id="subheader" class="font-huge no-margin"><small>{{block.subheader}}</small></h2>
			</div>
		</div>
		<div class="col-md-9">
			<!-- {{#each this.post_list}} -->
			<div class="col-md-12 div-table" element-post>
			    <div class=" col-md-4 table-cell">
			      	<img class="img-responsive" ng-src="{{post.source}}">
			    </div>
			    <div class="col-md-8 table-cell">
			      <h4 class="header no-margin">{{post.header}}</h4>
			      <p  ></p>
			      <div class="subheader description" ng-bind-html="post.subheader | sanitize"></div>
			    </div>
			</div>
			<!-- {{/each}} -->
		</div>

	</div>
</div>