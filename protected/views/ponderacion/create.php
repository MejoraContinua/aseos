<?php
/* @var $this PonderacionController */
/* @var $model Ponderacion */

$this->breadcrumbs=array(
	'Ponderaciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar ponderaciones', 'url'=>array('index')),
	array('label'=>'Administrar ponderación', 'url'=>array('admin')),
);
?>

<h1>Crear ponderación</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>