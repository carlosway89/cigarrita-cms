<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4><?=Yii::t('app','panel.posts')?></h4>
			<br>
				
				<div class="panel panel-default">
					<div class="panel-heading clean"></div>
					<div class="panel-body">
						<div class="dropdown" style="float:left">
		                  <a data-toggle="dropdown" class="dropdown-toggle btn grey lighten-1" href="#"><?=Yii::t('app','panel.posts.language')?> <span class="caret"></span></a>
		                  
		                  <ul class="dropdown-menu">
		                    <?php foreach ($language as $key => $value) {
		                    ?>
		                    <li>
		                      <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/posts/<?=$post_page?>/<?=$value->min?>"><?=$value->name?> 
		                      </a>
		                    </li>
		                    <?php } ?>
		                  </ul>
		                </div>
		                <?php if($lang!=Configuration::model()->findByPk(1)->language){ ?>
			                <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/syncLanguage/post/<?=$lang?>/<?=$post_page?>" class="btn-link col-sm-2" style="padding: 8px;text-align: center;"><i class="fa fa-random"></i> <?=Yii::t('app','panel.language.sync')?></a>
			                <?php 
			            	}else{
			            		echo "&nbsp;&nbsp;&nbsp;";
			            	}
                        ?>
		                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal1"><?=Yii::t('app','panel.posts.create')?></button>
		                <?php if($lang==Configuration::model()->findByPk(1)->language){ ?>
			                <?php if (Yii::app()->user->checkAccess("webmaster")) {
	    					?>
			                <a class="btn blue-grey lighten-2 pull-right" href="<?=Yii::app()->getBaseUrl(true)?>/panel/postConfig/<?=$post_page?>" ><i class="fa fa-cogs text-white"></i></a>
			                <?php }?>
		                <?php }?>
		                <br><br><br>
		                <?php 
		                	if (isset($_GET["message"])) {
								echo "<h6 id='message_updated' class='green-text light-green lighten-4 center-align alert'>".$_GET["message"]."</h6><br>";
							}
		                ?>
						<table id="postList" class="hoverable centered">
							<thead>
								<tr>
						            <th data-field="header"><?=Yii::t('app','panel.table.header')?></th>
						            <!-- <th data-field="flag">Subheader</th> -->
						            <th data-field="category"><?=Yii::t('app','panel.table.category')?></th>
						            <th data-field="state"><?=Yii::t('app','panel.table.state')?></th>
						            <th data-field="date"><?=Yii::t('app','panel.table.date')?></th>
						            <th><?=Yii::t('app','panel.table.options')?></th>
						        </tr>
							</thead>
							<tbody>
								<?php foreach ($list as $key => $value) {
								?>
								<tr>
									<td><?=$value->header?></td>
									<td><?=$value->category?></td>
									<td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?Yii::t('app','panel.table.state.on'):Yii::t('app','panel.table.state.off')?></td>
									<td><?=$value->date_created?></td>
									<td>
										
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/posts/<?=$value->idpost?>" class="text-success"><i class="fa fa-pencil "></i> <?=Yii::t('app','panel.edit')?></a>&nbsp;
										<?php 
										if (Yii::app()->user->checkAccess("webmaster")) {
											?>
										<a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/post/<?=$value->idpost?>/<?=$post_page?>/<?=$lang?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> <?=Yii::t('app','panel.delete')?></a>
										<?php }?>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

		</div>	
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1000 !important;max-height: 90%;width: 80%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel"><?=Yii::t('app','panel.posts.create')?></h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('//post/_form', 
			array(
					'model'=>$model,
					'message'=>$message,
					'category'=>$category,
					'post_page'=>$post_page,
					'language'=>$language,
					'lang'=>$lang,
					'variables'=>$variables,
					'attr'=>$attr,
					'post_config'=>$post_config
				)
			); 
		?>
      </div>
    </div>
</div>

<script type="text/javascript">
	
	window.onload = function(){ 
		

		$('.froala-editor-source').froalaEditor({
              toolbarInline: true,
              width: '1000',
              zIndex: 2501,
              imageDefaultWidth: '<?=$post_config->max_width?>',
              imageOutputSize: true,
              enter: $.FroalaEditor.ENTER_BR,
              language: '<?=Yii::app()->language?>',
              charCounterCount: false,
              imageUploadURL: "<?=Yii::app()->getBaseUrl(true)?>/api/upload",
              imageUploadParam: 'images',              
			  fileUploadURL: '<?=Yii::app()->getBaseUrl(true)?>/api/upload',
			  fileUploadParam: 'images',
              imageManagerLoadURL:"<?=Yii::app()->getBaseUrl(true)?>/api/images",
              imageManagerDeleteURL:"<?=Yii::app()->getBaseUrl(true)?>/api/deleteImage/files",
              linkAttributes: {
                'title':'Titulo'
              },
              <?php if ($post_config->type_source=="image" || $post_config->type_source=="galery") { ?>
              imageUploadParams: {
				width: '<?=$post_config->max_width?>',
				crop: '<?=$post_config->crop?>',
				height: '<?=$post_config->max_height?>',
				quality: '<?=$post_config->quality?>',
				is_image:true
			  },
              imageStyles: {
                "lightboxImage": 'lightboxImage',
              },              
              imageEditButtons: ['imageReplace', 'imageRemove', 'imageStyle', '|', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', 'imageSize'],
              toolbarButtons:['insertImage']
              <?php }?>
              <?php if ($post_config->type_source=="video") { ?>
              toolbarButtons:['insertVideo'],
              videoDefaultDisplay: 'inline'
              <?php } ?>
              <?php if ($post_config->type_source=="file") { ?>
              toolbarButtons:['insertFile']
              <?php } ?>
      	})
		<?php if ($post_config->type_source=="image" || $post_config->type_source=="galery" || $post_config->type_source=="background" ) { ?>
	      .on('froalaEditor.image.loaded', function (e, editor, $img) {
	        	var urls=[];

	        	$("#row_source").find("img").each(function(){
                  urls.push($(this).attr("src"));
                });
                
                if (urls.length==1 || urls.length==0) {                
                  var url_source=urls[0]?urls[0]:"";
                  $("#Post_url_source").val(url_source);
                }else{
                  var url_source=JSON.stringify(urls);
                  $("#Post_url_source").val(url_source);
                }
	      });
	    <?php }?>
	    <?php if ($post_config->type_source=="file") { ?>
	      .on('froalaEditor.file.inserted', function (e, editor, $file, response) {
	      		var url_source=$file[0].href;
	      		$("#Post_url_source").val(url_source);
	      });
	    <?php } ?>
	    <?php if ($post_config->type_source=="video") { ?>
	      .on('froalaEditor.video.inserted', function (e, editor, $video) {
	      		var url_source=$file[0].firstChild.src;
	      		$("#Post_url_source").val(url_source);
	      });
	    <?php } ?>

		setTimeout(function(){
			var beans=new Beans();
	        beans.generate_data_table('postList');
	        
	    },200);

	    
	    $('.add-new-attr').on('click',function(event){

			var html_attr=$('.attributes_inputs').html();

			$( '<div class="col-sm-12 attributes_inputs">'+html_attr+'</div>').insertAfter(".attributes_inputs:last-child");
			
			setTimeout(function(){
				$('.attributes_inputs:last-child').find('.add-new-attr').hide();
				$('.delete-new-attr').on('click',function(event){
					$(event.currentTarget).parent().parent().remove();
				});
			},100)
		});
	};
	
</script>

