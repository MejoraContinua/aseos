<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluaciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar evaluaciones', 'url'=>array('index')),
	array('label'=>'Administrar evaluaciones', 'url'=>array('admin')),
);
?>

<h1>Crear evaluación</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>