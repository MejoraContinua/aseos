<?php
/* @var $this EstadoController */
/* @var $model Estado */

$this->breadcrumbs=array(
	'Estados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar estados de aseo', 'url'=>array('index')),
	array('label'=>'Administrar estados de aseo', 'url'=>array('admin')),
);
?>

<h1>Crear estados de aseo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>