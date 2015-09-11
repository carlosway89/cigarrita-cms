<?php
  // foreach ($model as $value) {
  //     // print_r($value->category0);
  //     $cat=$value->category0;
  //     if ($cat) {
  //        print_r($cat->attributes);
  //       // foreach ($cat as $value_cat) {
  //       //   print_r($value_cat);
  //       // }
  //     }
      
  // }
?>

<div class="container-fluid embed-panel">
	<div class="row">
		<div class="col-sm-12">
			<br>
			<h4>Facebook Integration</h4>
			<br>
				
        <?php if ($config->id_facebook) {          
        ?>
        <ul role="tablist" class="nav nav-tabs" id="myTab">
          <li class=""><a data-toggle="tab" role="tab" href="#feeds">Feeds</a></li>
          <li class=""><a data-toggle="tab" role="tab" href="#gallery">Gallery</a></li>
          <li class="active"><a data-toggle="tab" role="tab" href="#events">Events</a></li>
          <li class=""><a data-toggle="tab" role="tab" href="#contact">Contact</a></li>
          <li class=""><a data-toggle="tab" role="tab" href="#about">About</a></li>
          
        </ul>
        <div class="tab-content" id="myTabContent">
          <div id="feeds" class="tab-pane tabs-up fade panel panel-default">
            <div class="panel-body">
              <?php if (!$model_feeds) {
              ?>
              <a href="#" class="btn btn-primary"><i class="fa fa-refresh"></i> Sync <small>Feeds</small> from Facebook</a>
              <?php
              }else{?>                          
              <table id="feedsList" class="hoverable centered">
                <thead>
                  <tr>
                          <th data-field="name">Header</th>
                          <th data-field="flag">Subheader</th>
                          <th data-field="flag">Category</th>
                          <th data-field="state">State</th>
                          <th data-field="state">Date Created</th>
                          <th>Options</th>
                      </tr>
                </thead>
                <tbody>
                  <?php foreach ($model_feeds as $value) {
                  ?>
                  <tr>
                    <td><?=$value->header?></td>
                    <td><?=substr($value->subheader, 0, 30)."..."?></td>
                    <td><?=$value->category?></td>
                    <td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
                    <td><?=$value->date_created?></td>
                    <td>
                      <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/post/<?=$value->idpost?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Delete</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php }?>
            </div>
          </div>
          <div id="events" class="tab-pane tabs-up fade panel panel-default active in">
            <div class="panel-body">
              <?php if (!$model_events) {
              ?>
              <a href="#" class="btn btn-primary"><i class="fa fa-refresh"></i> Sync <small>Events</small> from Facebook</a>
              <?php
              }else{?>                          
              <table id="eventsList" class="hoverable centered">
                <thead>
                  <tr>
                          <th data-field="name">Header</th>
                          <th data-field="flag">Subheader</th>
                          <th data-field="flag">Category</th>
                          <th data-field="state">State</th>
                          <th data-field="state">Date Created</th>
                          <th>Options</th>
                      </tr>
                </thead>
                <tbody>
                  <?php foreach ($model_events as $value) {
                  ?>
                  <tr>
                    <td><?=$value->header?></td>
                    <td><?=substr($value->subheader, 0, 30)."..."?></td>
                    <td><?=$value->category?></td>
                    <td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
                    <td><?=$value->date_created?></td>
                    <td>
                      <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/post/<?=$value->idpost?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Delete</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php }?>
            </div>
          </div>
          <div id="gallery" class="tab-pane tabs-up fade panel panel-default">
            <div class="panel-body">
              <?php if (!$model_gallery) {
              ?>
              <a href="#" class="btn btn-primary"><i class="fa fa-refresh"></i> Sync <small>Gallery</small> from Facebook</a>
              <?php
              }else{?>                          
              <table id="galleryList" class="hoverable centered">
                <thead>
                  <tr>
                          <th data-field="name">Header</th>
                          <th data-field="flag">Subheader</th>
                          <th data-field="flag">Category</th>
                          <th data-field="state">State</th>
                          <th data-field="state">Date Created</th>
                          <th>Options</th>
                      </tr>
                </thead>
                <tbody>
                  <?php foreach ($model_gallery as $value) {
                  ?>
                  <tr>
                    <td><?=$value->header?></td>
                    <td><?=substr($value->subheader, 0, 30)."..."?></td>
                    <td><?=$value->category?></td>
                    <td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
                    <td><?=$value->date_created?></td>
                    <td>
                      <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/post/<?=$value->idpost?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Delete</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php }?>
            </div>
          </div>
          <div id="contact" class="tab-pane tabs-up fade panel panel-default">
            <div class="panel-body">
              <?php if (!$model_contact) {
              ?>
              <a href="#" class="btn btn-primary"><i class="fa fa-refresh"></i> Sync <small>Contact Information</small> from Facebook</a>
              <?php
              }else{?>                          
              <table id="contactList" class="hoverable centered">
                <thead>
                  <tr>
                          <th data-field="name">Header</th>
                          <th data-field="flag">Subheader</th>
                          <th data-field="flag">Category</th>
                          <th data-field="state">State</th>
                          <th data-field="state">Date Created</th>
                          <th>Options</th>
                      </tr>
                </thead>
                <tbody>
                  <?php foreach ($model_contact as $value) {
                  ?>
                  <tr>
                    <td><?=$value->header?></td>
                    <td><?=substr($value->subheader, 0, 30)."..."?></td>
                    <td><?=$value->category?></td>
                    <td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
                    <td><?=$value->date_created?></td>
                    <td>
                      <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/post/<?=$value->idpost?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Delete</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php }?>
            </div>
          </div>
          <div id="about" class="tab-pane tabs-up fade panel panel-default">
            <div class="panel-body">
              <?php if (!$model_about) {
              ?>
              <a href="#" class="btn btn-primary"><i class="fa fa-refresh"></i> Sync <small>About Information</small> from Facebook</a>
              <?php
              }else{?>                          
              <table id="aboutList" class="hoverable centered">
                <thead>
                  <tr>
                          <th data-field="name">Header</th>
                          <th data-field="flag">Subheader</th>
                          <th data-field="flag">Category</th>
                          <th data-field="state">State</th>
                          <th data-field="state">Date Created</th>
                          <th>Options</th>
                      </tr>
                </thead>
                <tbody>
                  <?php foreach ($model_about as $value) {
                  ?>
                  <tr>
                    <td><?=$value->header?></td>
                    <td><?=substr($value->subheader, 0, 30)."..."?></td>
                    <td><?=$value->category?></td>
                    <td><i class="fa fa-circle <?=$value->state?'text-success':'text-warning'?>"></i> <?=$value->state?'Enable':'Disable'?></td>
                    <td><?=$value->date_created?></td>
                    <td>
                      <a href="<?=Yii::app()->getBaseUrl(true)?>/panel/delete/post/<?=$value->idpost?>" class="text-danger delete-link"><i class="fa fa-trash-o "></i> Delete</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php }?>
            </div>
          </div>
        </div>
        <?php }else{?>
        <form method="POST">
          <input name="login" value="true" type="hidden">
          <button class="btn btn-primary" type="submit">Login With Facebook</button>
        </form>
        <?php }?>
				

		</div>	
	</div>
</div>

