<div class="container-fluid embed-panel">

    	<div class="row">

        	<div class="col-lg-9 col-xs-5">
        		<h4><?=Yii::t('app','panel.messages.table.message')?></h4>
	            <a class="btn btn-default" href="<?=Yii::app()->getBaseUrl(true)?>/panel/messages"><i class="fa fa-fw fa-level-up fa-rotate-270"></i></a>
	            
	            <div class="btn-group visible-lg-inline-block">
	              <a class="btn btn-default " href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/form/<?=$model->idform?>"><i class="fa fa-trash"></i></a>
	            </div>
	            
	        	
            
            
            </div>
        </div>
        <div class="row">
        	<div class="col-sm-12">
		    	<hr class="clean">
		    	<div class="panel panel-default">
		            <div class="panel-body">
		            	
		                <div class="row">
		                	<div class="col-lg-11">
		            		<h4 class="no-margn"><?=substr($model->subject, 0, 30)."..."?></h4>
		                    </div>
		                    <div class="col-lg-1 text-right">
		                	<a href="javascript:window.print()"><i class="fa fa-print"></i></a>
		                	</div>
		                </div>
		                
		                <hr class="sm">
		                
		                <div class="row">
		                	<div class="col-lg-6">
		                    <span class="form-control-static"> <?=$model->email?> <span class="text-gray">&lt;<?=$model->email?>&gt;</span></span>
		                    </div>
		                    <div class="col-lg-6 text-right">
		                    	<small class="form-control-static text-gray"><?=$model->date?></small>
		                        <div class="btn-group">
		                          <a href="mailto:<?=$model->email?>?subject=<?=substr($model->subject, 0, 30)."..."?>&cc=admin@example.org&body=<?=$model->subject?>" class="btn btn-default btn-sm"><?=Yii::t('app','panel.messages.reply')?></a>
		                          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
		                            <span class="caret"></span>
		                            <span class="sr-only">Toggle Dropdown</span>
		                          </button>
		                          <ul role="menu" class="dropdown-menu pull-right">
		                            <li><a href="javascript:window.print()"><?=Yii::t('app','panel.messages.print')?></a></li>
		                            <li><a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/form/<?=$model->idform?>"><?=Yii::t('app','panel.messages.delete')?></a></li>
		                          </ul>
		                        </div>
		                    </div>
		                </div>
		                
		                <hr class="sm">
		                
		                <div class="row">
		                	<div class="col-sm-12">
		                		<p style="white-space: pre;"><?=$model->subject?></p>
		                	</div>
		                </div>
		                <hr>
		                <div class="row">
		                	<div class="col-sm-4">
		                		<address>
				                  <strong><?=Yii::t('app','panel.messages.table.country')?></strong>
				                  <code><?=$model->country_name?></code>
				                </address>
		                	</div>
		                	<div class="col-sm-4">
		                		<address>
				                  <strong><?=Yii::t('app','panel.messages.device')?></strong>
				                  <code><?=$model->browser?></code>
				                </address>
		                	</div>
		                	<div class="col-sm-4">
		                		<address>
		                			<strong><?=Yii::t('app','panel.messages.ip')?></strong>
		                  			<code><?=$model->ip_address?></code>
		                		</address>
		                	</div>
			                
		                </div>
		                
		                
		                
		                
		                
		            
		            </div>
		        </div>
	        </div>
        </div>
    

</div>