<div class=" page-content page-white " style="padding-top:30px;min-height: 490px;">
	<div class="container">
		<div class="col-md-12">
			<div class="col-md-4">
				<h1 id="header" class="font-huge text-center no-margin">Cuentanos Sobre Lo que tienes en Mente</h1>
				<div class="alert alert-success" style="display:none">
					<strong><i class="hand up huge icon no-margin"></i> Success :)</strong> your message was sent
				</div>
				<div id="subheader">
					<small></small>
				</div>

			</div>
			<div class="col-md-8">
				<img id="background" src="" class="img-responsive" alt="subscribe">
			</div>				
		</div>

	</div>
	<br>
	{{#each this.post_list}}
	<div class="container">
		<div class="col-md-12">
			<p class="font-large text-light text-center" style="padding-top:10px">{{this.subheader}}</p>
		</div>  
	</div>
	<br>  	
	{{/each}}
</div>