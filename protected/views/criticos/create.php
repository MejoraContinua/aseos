<?php
/* @var $this CRITICOSController */
/* @var $model CRITICOS */

$this->breadcrumbs=array(
	'Críticos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar críticos', 'url'=>array('index')),
	array('label'=>'Administrar crítico', 'url'=>array('admin')),
);
?>

<h1>Crear crítico</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>