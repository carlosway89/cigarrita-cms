<?php
/* @var $this BlockController */
/* @var $model Block */

$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	$model->idblock=>array('view','id'=>$model->idblock),
	'Update',
);

$this->menu=array(
	array('label'=>'List Block', 'url'=>array('index')),
	array('label'=>'Create Block', 'url'=>array('create')),
	array('label'=>'View Block', 'url'=>array('view', 'id'=>$model->idblock)),
	array('label'=>'Manage Block', 'url'=>array('admin')),
);
?>

<h1>Update Block <?php echo $model->idblock; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>