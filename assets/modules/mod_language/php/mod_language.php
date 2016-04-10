<?php
	echo "hallo ich bin ein Modul";

	$lang=$Language->find();
	
?>
<h1>hallo MODUL</h2>
<p><?php echo $lang->name; ?></p>