<?php
/* @var $this ItemSeEvaluaController */
/* @var $model ItemSeEvalua */

$this->breadcrumbs=array(
	'Item Se Evalua'=>array('index'),
	$model->ID_ISE=>array('view','id'=>$model->ID_ISE),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Items a evaluar', 'url'=>array('index')),
	array('label'=>'Crear Item a evaluar', 'url'=>array('create')),
	array('label'=>'Ver item a evaluar', 'url'=>array('view', 'id'=>$model->ID_ISE)),
	array('label'=>'Administrar item a evaluar', 'url'=>array('admin')),
);
?>

<h1>Actualizar item a evaluar #<?php echo $model->ID_ISE; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>