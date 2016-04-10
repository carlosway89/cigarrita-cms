<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Ayuda</h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<div class="panel-group" id="accordion">
	                      <div class="panel panel-default">
	                        <div class="panel-heading">
	                          <h4 class="panel-title">
	                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
	                              Getting Started
	                            </a>
	                          </h4>
	                        </div>
	                        <div id="collapseOne" class="panel-collapse collapse in">
	                          <div class="panel-body">
	                          	
	                          	<h4>Enabling Templates</h4>
	                          	<blockquote>
	                          		<ul>
	                          			<li>1.- element-block: each page has a set of blocks: componets[ header,subheader,source ]</li>
	                          			<li>2.- element-post: each block has a set of posts: componets[ header,subheader,source,attributes ]</li>
	                          			<li>3.- categories: each block or post bellow to a category</li>
	                          		</ul>	
	                          		
	                          		
	                          	</blockquote>
	                          	<pre><code class="language-bash" data-lang="bash">element-block='category-name'
├── {{block.header}}:(text or html)
├── {{block.subheader}}:(text or html)
├── {{block.source}}:(image_url or video_url)
├── element-post
│   ├── {{post.header}}:(text or html) 
│   ├── {{post.subheader}}:(text or html) 
│   └── {{post.source}}:(image_url or video_url)
└── </code></pre>
<hr>
								<h4>Enabling Editor Inline</h4>
	                          	<blockquote>
	                          		<ul>
	                          			<li>1.- element-object: specify what kind of element bellow to ( post, block ) </li>
	                          			<li>2.- element-contenido: before the variable wrapped by {{var}} must insert this element to able the editor inline</li>
	                          		</ul>	
	                          		
	                          		
	                          	</blockquote>
	                          	<pre><code class="language-bash" data-lang="bash">
element-block='category-name'
├── element-object='block'
│	└── &lt;div element-contenido &gt{{block.header}}&lt;/div&gt
├── element-object='block'
│	└── &lt;div element-contenido &gt{{block.subheader}}&lt;/div&gt
│	
├── element-post  element-object='post'
│   ├── &lt;div element-contenido &gt{{post.header}}&lt;/div&gt
│   └── &lt;div element-contenido &gt{{post.subheader}}&lt;/div&gt
│   
└── </code></pre>
<hr>
								<h4>Example of a block's page with complete code-configuration</h4>
	                          	
	                          	<pre><code class="language-bash" data-lang="bash">
&lt;div element-block="services" &gt
	&lt;div class="row"&gt
		&lt;h1  element-object="block" &gt&lt;span element-contenido &gt{{block.header}}&lt;/span&gt&lt;/h1&gt
		&lt;h2 element-object="block" &gt&lt;small element-contenido &gt{{block.subheader}}&lt;/small&gt&lt;/h2&gt
	&lt;/div&gt
	&lt;div class="row"&gt
		&lt;div element-object="post" element-post &gt				
			&lt;img src="{{post.source}}" &gt
		  	&lt;h2 element-contenido &gt{{post.header}}&lt;/h2&gt
			&lt;p element-contenido &gt{{post.subheader}}&lt;/p&gt
		&lt;/div&gt
	&lt;/div&gt
&lt;/div&gt
									</code>
								</pre>
								<hr>
								<h4>Page Scheme</h4>
								<br>
								<div class="well">
									<h5>Page</h5>
									<br>
	                          		<div class="alert alert-info text-center">
	                          			<h5>Block HEADER</h5>
	                          			<h6>Block SUBHEADER</h6>
	                          			<br>
	                          			<div class="row">
	                          				<div class="col-md-4">
	                          					<div class="alert alert-warning">
	                          						<h5>Post 1 HEADER </h5>
	                          						<h6>Post 1 SUBHEADER</h6>
	                          					</div>
	                          				</div>
	                          				<div class="col-md-4">
	                          					<div class="alert alert-warning">
	                          						<h5>Post 2 HEADER </h5>
	                          						<h6>Post 2 SUBHEADER</h6>
	                          					</div>
	                          				</div>
	                          				<div class="col-md-4">
	                          					<div class="alert alert-warning">
	                          						<h5>Post 3 HEADER </h5>
	                          						<h6>Post 3 SUBHEADER</h6>
	                          					</div>
	                          				</div>
	                          			</div>
	                          		</div>
	                          		<br>
	                          		<div class="alert alert-info text-center">
	                          			<h5>......</h5>
	                          		</div>
	                          	</div>
	                          </div>
	                        </div>
	                      </div>
	                      <div class="panel panel-default">
	                        <div class="panel-heading">
	                          <h4 class="panel-title">
	                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
	                              Manages Pages
	                            </a>
	                          </h4>
	                        </div>
	                        <div style="height: 0px;" id="collapseTwo" class="panel-collapse collapse">
	                          <div class="panel-body">
	                          	<h5>Manage Pages</h5>
	                          	<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/pages">go to manage pages</a>
	                          	<blockquote>
	                          		<ul>
	                          			<li>1.- will be listed all the view/pages saved and generated.</li>
	                          			<li>2.- you can ADD a new page, editing the HTML content clicking "edit" or delete the page clicking "delete"</li>
	                          			<li>3.- First at all you need add Categories, bellow to each block inserted into the page.</li>
	                          			<li>3.- Secondly you need add block to each the page clicking "details" and "add new".</li>
	                          			<li>4.- And finally, you can add new post in the panel inline-editor or by WebPosts-menu option</li>
	                          		</ul>
	                          		

	                          	</blockquote>
	                          	<div class="text-center" >
	                          		<img style="box-shadow: 0px 2px 5px rgba(0,0,0,0.5);" src="<?=Yii::app()->request->baseUrl?>/assets/panel/images/screen-category.png" class="responsive-img">
	                          	</div>
	                          </div>
	                        </div>
	                      </div>
	                      <div class="panel panel-default">
	                        <div class="panel-heading">
	                          <h4 class="panel-title">
	                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseConfig">
	                              Variables and Configurations
	                            </a>
	                          </h4>
	                        </div>
	                        <div style="height: 0px;" id="collapseConfig" class="panel-collapse collapse">
	                          <div class="panel-body">
	                          	<blockquote>
	                          		<h6>element-object:</h6>
	                          		<ul>
	                          			<li>- data-type: ( slider, none-editor)
	                          			</li>
	                          		</ul>
	                          	</blockquote>  
	                          	<blockquote>
	                          		<h6>element-post:</h6>
	                          		<ul>
	                          			<li>- data-type: ( slider, none-editor)</li>
                      					<li>- data-add-hide: (true, false or not added)</li>
                      					<li>- data-limit: number and limit of items </li>
                      					<li>- data-order: ASC(-idpost) or DESC(idpost) </li>
                      					<li>- ng-class: "{active : $first}" set a active Class to the first Item</li>
	                          			<li>- element-contenido="non-editor" : disable the inline editor</li>
	                          		</ul>
	                          	</blockquote>
	                          </div>
	                        </div>
	                      </div>
	                      <div class="panel panel-default">
	                        <div class="panel-heading">
	                          <h4 class="panel-title">
	                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
	                              Facebook Sync and Insert New Attributes to each Post
	                            </a>
	                          </h4>
	                        </div>
	                        <div style="height: 0px;" id="collapseThree" class="panel-collapse collapse">
	                          <div class="panel-body">
	                          	<blockquote>
	                          		<ul>
	                          			<li>1.- You Need to Insert your ID facebook FanPage of your bussines into the <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/config">Config Page option</a><br>
	                          				ex1: <small>https://www.facebook.com/cigarritaworker?fref=ts</small> the IDpage would be <code>cigarritaworker</code><br>
	                          				ex2: <small>https://www.facebook.com/CyS.ComputerSolutions</small> the IDpage would be <code>CyS.ComputerSolutions</code> 
	                          			</li>
	                          			<li>
	                          				2.- then you need to go to the facebook menu and login with your Facebook Account
	                          			</li>
	                          			<li>3.- you can sync each option gave it into the CMS (gallery, events, Feeds, about, countact info) from Facebook</li>
	                          		</ul>
	                          	</blockquote>  
	                          </div>
	                        </div>
	                      </div>
	                    </div>
					</div>
				</div>

		</div>	
	</div>
</div>





