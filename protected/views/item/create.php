<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar items', 'url'=>array('index')),
	array('label'=>'Administrar items', 'url'=>array('admin')),
);
?>

<h1>Crear item</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>