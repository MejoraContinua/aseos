<?php
/* @var $this LugarController */
/* @var $model Lugar */

$this->breadcrumbs=array(
	'Lugares'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar lugares', 'url'=>array('index')),
	array('label'=>'Administrar lugares', 'url'=>array('admin')),
);
?>

<h1>Crear lugar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>