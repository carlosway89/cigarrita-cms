<div id="blog" class="page-gray" element-block="posts">
	<div id="" class="container">
		<br><br>
		<div class="col-md-3">
			<div class="col-md-12">
				<h2 id="header" element-object="block" class="font-huge no-margin" ><span element-editable ng-model="block.subheader">{{block.header}}</span></h2>
				<h2 id="subheader" element-object="block" class="font-huge no-margin"><small element-editable ng-model="block.subheader">{{block.subheader}}</small></h2>
			</div>
		</div>
		<div class="col-md-9">
			<!-- {{#each this.post_list}} -->
			<div class="col-md-12 div-table" element-post>
			    <div class=" col-md-4 table-cell">
			      	<img class="img-responsive" ng-src="{{post.source}}">
			    </div>
			    <div class="col-md-8" element-object="post">
			      <h4 class="header no-margin" element-editable ng-model="post.header" >{{post.header}}</h4>
			      <p  ></p>
			      <div class="subheader description" element-editable ng-model="post.subheader" ng-bind-html="post.subheader | sanitize"></div>
			    </div>
			</div>
			<!-- {{/each}} -->
		</div>

	</div>
</div>