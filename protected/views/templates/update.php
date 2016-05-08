<?php
/* @var $this TemplatesController */
/* @var $model Templates */

$this->breadcrumbs=array(
	'Templates'=>array('index'),
	$model->name=>array('view','id'=>$model->idtemplates),
	'Update',
);

$this->menu=array(
	array('label'=>'List Templates', 'url'=>array('index')),
	array('label'=>'Create Templates', 'url'=>array('create')),
	array('label'=>'View Templates', 'url'=>array('view', 'id'=>$model->idtemplates)),
	array('label'=>'Manage Templates', 'url'=>array('admin')),
);
?>

<h1>Update Templates <?php echo $model->idtemplates; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>