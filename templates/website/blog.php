<div class="page-gray" style="">
	<div id="" class="container">
		<br><br>
		<div class="col-md-3">
			<div class="col-md-12">
				<h2 id="header"  class="font-huge no-margin" >{{header}}</h2>
				<h2 id="subheader" class="font-huge no-margin"><small>{{subheader}}</small></h2>
			</div>
		</div>
		<div class="col-md-9">
			{{#each this.post_list}}
			<div class="col-md-12 div-table" >
			    <div class=" col-md-4 table-cell">
			      	<img class="img-responsive" src="{{this.image}}">
			    </div>
			    <div class="col-md-8 table-cell">
			      <h4 class="header no-margin">{{this.header}}</h4>
			      <div class="description">
			        {{{this.subheader}}}
			      </div>
			    </div>
			</div>
			{{/each}}
		</div>

	</div>
</div>