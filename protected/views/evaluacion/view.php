<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluacions'=>array('index'),
	$model->ID_EVALUACION,
);

$this->menu=array(
	array('label'=>'Listar evaluaciones', 'url'=>array('index')),
	array('label'=>'Crear evaluación', 'url'=>array('create')),
	array('label'=>'Actualizar evaluación', 'url'=>array('update', 'id'=>$model->ID_EVALUACION)),
	array('label'=>'Eliminar evaluación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_EVALUACION),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar evaluación', 'url'=>array('admin')),
);
?>

<h1>Vista evaluación <?php echo $model->NOMBRE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NOMBRE',
	),
)); ?>
