<?php
/* @var $this BlockController */
/* @var $model Block */

$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Block', 'url'=>array('index')),
	array('label'=>'Manage Block', 'url'=>array('admin')),
);
?>

<h1>Crear un Block</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>