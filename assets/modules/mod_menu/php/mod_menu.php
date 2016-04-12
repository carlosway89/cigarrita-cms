<?php

// assert framework initialization
defined('cigarrita') || die('Illegal call: Missing framework initialization - request aborted.');

$links=$Menu->findAll("is_deleted='0' AND state='1' AND language='es' ");


?>
<ul class="nav navbar-nav navbar-right header-options">
    <?php foreach ($links as $link) {  ?>
    <li><a ng-href="<?=$link->url?>" menu-links="<?=$link->type?>" ><?=$link->name?></a></li>
    <?php } ?>
</ul>