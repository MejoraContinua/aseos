<?php
/* @var $this FlotaController */
/* @var $model Flota */

$this->breadcrumbs=array(
	'Flotas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar flotas', 'url'=>array('index')),
	array('label'=>'Administrar flotas', 'url'=>array('admin')),
);
?>

<h1>Crear flota</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>