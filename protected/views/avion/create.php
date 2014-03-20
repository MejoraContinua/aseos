<?php
/* @var $this AvionController */
/* @var $model Avion */

$this->breadcrumbs=array(
	'Avions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar aviones', 'url'=>array('index')),
	array('label'=>'Administrar aviones', 'url'=>array('admin')),
);
?>

<h1>Crear avión</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>