<?php


// assert framework initialization
defined('cigarrita') || die('Illegal call: Missing framework initialization - request aborted.');

$list_language=Language::model()->findAll("is_deleted='0' AND estado='1'");

?>
<script type="text/javascript">

</script>
<style type="text/css">
  .selection.dropdown{
    margin: 10px;
    float: left !important;
    position: fixed !important;
    bottom: 0px !important;
    display: inline-block !important;
    box-shadow: 0px 0px 0px 3px rgba(0, 0, 0, 0.2) !important
  }
  .menu.laguage-select{
      bottom: 40px !important;
	  top: inherit !important;
      height: 70px !important;
	      /*bottom: -200px !important;
	      top: -170% !important;*/
      border-radius: 5px !important;
  }
  .menu.laguage-select .item{
      font-size: 12px !important;
  }
</style>
<div class="ui search selection dropdown pull-right" language-select="language">
    <input id="language_option" name="language" type="hidden">
    <div class="default text">Language</div>
    <i class="fa fa-angle-up"></i> 
    <div class="menu laguage-select" style="z-index: 1000;" >
        <?php foreach ($list_language as $lang_val) {
        ?>
        <div class="item" data-value="<?=$lang_val->min?>">
          <i class="flag-icon-<?=$lang_val->flag?> flag-icon"></i> <?=$lang_val->name?>
        </div>
        <?php }?>
    </div>
</div>
