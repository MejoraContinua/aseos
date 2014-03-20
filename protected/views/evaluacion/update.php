<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluacions'=>array('index'),
	$model->ID_EVALUACION=>array('view','id'=>$model->ID_EVALUACION),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar evaluación', 'url'=>array('index')),
	array('label'=>'Crear evaluación', 'url'=>array('create')),
	array('label'=>'Ver evaluación', 'url'=>array('view', 'id'=>$model->ID_EVALUACION)),
	array('label'=>'Administrar evaluación', 'url'=>array('admin')),
);
?>

<h1>Actualizar evaluación <?php echo $model->NOMBRE; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>