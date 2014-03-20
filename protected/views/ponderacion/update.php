<?php
/* @var $this PonderacionController */
/* @var $model Ponderacion */

$this->breadcrumbs=array(
	'Ponderaciones'=>array('index'),
	$model->ID_PONDERACION=>array('view','id'=>$model->ID_PONDERACION),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar ponderaciones', 'url'=>array('index')),
	array('label'=>'Crear ponderación', 'url'=>array('create')),
	array('label'=>'View Ponderacion', 'url'=>array('view', 'id'=>$model->ID_PONDERACION)),
	array('label'=>'Administrar ponderación', 'url'=>array('admin')),
);
?>

<h1>Actualizar ponderación #<?php echo $model->ID_PONDERACION; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>