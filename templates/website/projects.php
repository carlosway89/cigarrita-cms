<div class="ui four column doubling page grid page-content  page-gray " style="padding-top:20px;min-height: 560px;">
	<div class="row">
		<h1 id="header" class="font-huge text-center no-margin">Ultimos Proyectos</h1>
		<h2 id="subheader" class="font-huge text-center"><small>Aqui Algunos de los que hemos hecho.</small></h2>
	</div>
	<div class="row">
		<div id="carousel-slider" class="carousel slide" data-ride="carousel" >
		  <!-- Indicators -->
		  
		  <div class="col-md-12 ">
		  	<div class="row carousel-indicators" role="tablist">
		  		{{#each this.post_list}}
		  		<div class="col-xs-{{this.count}} pointer {{this.active}}" data-target="#carousel-slider" data-slide-to="{{this.index}}">
		  			<i class="{{this.class}} huge icon no-margin"></i>
		  		</div>
		  		{{/each}}
		  	</div>
		  </div>


		  <i class="store-showcase background-tabbed-nav-separator"></i>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner ui page grid margin-top" role="listbox" >

		  	{{#each this.post_list}}
		    <div class="item {{active}} ">
		    	<div class="">
		    		<div class="col-md-12">
		    			<div class="col-md-9 ipad-ground">
		    				<img src="{{this.image}}" class="img-responsive" alt="cigarrita-worker">
		    			</div>
		    			<div class="col-md-3">
		    				<h4>{{this.header}}</h4>
		    				{{{this.subheader}}}
		    			</div>
		    		</div>
		    	</div>				    	
		    </div>
		    {{/each}}	

		  </div>
		</div>
	</div>
</div>