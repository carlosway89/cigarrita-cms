<div class="container page-content  page-white " style="padding-top:20px;min-height: 800px;">
	<br>
	<div class="col-md-12">
		<h1 id="header" class="font-huge text-center no-margin">Creamos Novedosas y Poderosas Aplicaciones.</h1>
		<h2 id="subheader" class="font-huge text-center no-margin"><small>Facilitamos la manera de construir tu Proyecto o Idea.</small></h2>
	</div>
	<br>
	<div class="row">
		{{#each this.post_list}}
		<div class="col-md-3 col-sm-3 bottom-20 text-center">
			<div class="ui raised ">
			  	<h2 class="font-large text-icon no-margin">
			  		<img src="{{this.image}}" class="img-responsive img-icon">
			  		{{this.header}}</h2>
				<p class="p-text text-ligth ">{{{this.subheader}}}</p>
			</div>
		</div>
		{{/each}}	
	</div>
</div>