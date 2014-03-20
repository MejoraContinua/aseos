<?php
/* @var $this OperadorController */
/* @var $model Operador */

$this->breadcrumbs=array(
	'Operadores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar operadores', 'url'=>array('index')),
	array('label'=>'Administrar operadores', 'url'=>array('admin')),
);
?>

<h1>Crear operadores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>