<?php
/* @var $this OperadorController */
/* @var $model Operador */

$this->breadcrumbs=array(
	'Operadores'=>array('index'),
	$model->ID_OPERADOR=>array('view','id'=>$model->ID_OPERADOR),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar operadores', 'url'=>array('index')),
	array('label'=>'Crear operador', 'url'=>array('create')),
	array('label'=>'Ver operador', 'url'=>array('view', 'id'=>$model->ID_OPERADOR)),
	array('label'=>'Administrar operadores', 'url'=>array('admin')),
);
?>

<h1>Actualizar operador <?php echo $model->NOMBRE_OPERADOR; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>