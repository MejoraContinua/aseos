<?php
/* @var $this NotaController */
/* @var $model Nota */

$this->breadcrumbs=array(
	'Notas'=>array('index'),
	$model->ID_NOTA=>array('view','id'=>$model->ID_NOTA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Nota', 'url'=>array('index')),
	array('label'=>'Create Nota', 'url'=>array('create')),
	array('label'=>'View Nota', 'url'=>array('view', 'id'=>$model->ID_NOTA)),
	array('label'=>'Manage Nota', 'url'=>array('admin')),
);
?>

<h1>Update Nota <?php echo $model->ID_NOTA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>