<?php
/* @var $this ItemSeEvaluaController */
/* @var $model ItemSeEvalua */

$this->breadcrumbs=array(
	'Item se evalua'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Items a evaluar', 'url'=>array('index')),
	array('label'=>'Administrar item a evaluar', 'url'=>array('admin')),
);
?>

<h1>Crear Item a evaluar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>