<?php
/* @var $this VariableController */
/* @var $model Variable */

$this->breadcrumbs=array(
	'Variables'=>array('index'),
	$model->idvariable=>array('view','id'=>$model->idvariable),
	'Update',
);

$this->menu=array(
	array('label'=>'List Variable', 'url'=>array('index')),
	array('label'=>'Create Variable', 'url'=>array('create')),
	array('label'=>'View Variable', 'url'=>array('view', 'id'=>$model->idvariable)),
	array('label'=>'Manage Variable', 'url'=>array('admin')),
);
?>

<h1>Update Variable <?php echo $model->idvariable; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>