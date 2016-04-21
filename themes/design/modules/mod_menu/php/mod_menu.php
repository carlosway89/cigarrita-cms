<?php

// assert framework initialization
defined('cigarrita') || die('Illegal call: Missing framework initialization - request aborted.');


$lang=Yii::app()->request->cookies["language_initial"]->value;
$lang=$lang!=""?$lang:Configuration::model()->find()->language;
$links=$Menu->findAll("state='1' AND is_deleted='0' AND language='".$lang."' order by position");


$tree_array=array();

$pos=0;


foreach ($links as $val) {
	$tree_array[$pos]=$val->attributes;
	$pos++;
}


$pidKey="parent_id";
$idKey="idmenu";

$grouped = array();
foreach ($tree_array as $sub){
    $grouped[$sub[$pidKey]][] = $sub;
}


$fnBuilder = function($siblings) use (&$fnBuilder, $grouped, $idKey) {
    foreach ($siblings as $k => $sibling) {
        $id = $sibling[$idKey];
        if(isset($grouped[$id])) {
            $sibling['sub_menu'] = $fnBuilder($grouped[$id]);
        }
        $siblings[$k] = $sibling;
    }

    return $siblings;
};

$tree = $fnBuilder($grouped[0]);


?>

<ul class="nav navbar-nav navbar-right header-options">
    <?php foreach ($tree as $link) {  ?>
    	<li><a ng-href="<?=$link['url']?>" menu-links="<?=$link['type']?>" ><?=$link['name']?></a>
    	
    	<?php 

    	if ($link['sub_menu']) {
    		    
    	?>
    	<ul class="nav navbar-nav navbar-right header-options">
    	<?php
	    	foreach ($link['sub_menu'] as $sub_link) {  ?>
	    		<li><a ng-href="<?=$sub_link['url']?>" menu-links="<?=$sub_link['type']?>" ><?=$sub_link['name']?></a>
	    			<?php 

			    	if ($sub_link['sub_menu']) {
			    		    
			    	?>
			    	<ul class="nav navbar-nav navbar-right header-options">
			    	<?php
				    	foreach ($sub_link['sub_menu'] as $sub_sub_link) {  ?>
				    		<li><a ng-href="<?=$sub_sub_link['url']?>" menu-links="<?=$sub_sub_link['type']?>" ><?=$sub_sub_link['name']?></a></li>
				    	<?php } 
				    ?>
					</ul>
				    <?php
			    	}?>	
	    		</li>
	    	<?php } 
	    ?>
		</ul>
	    <?php
    	}?>	
    	</li>
    <?php } ?>
</ul>