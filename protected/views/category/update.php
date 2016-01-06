<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->category=>array('view','id'=>$model->category),
	'Update',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'View Category', 'url'=>array('view', 'id'=>$model->category)),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>Actualizar Categoria <?php echo $model->category; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>