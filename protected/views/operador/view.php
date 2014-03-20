<?php
/* @var $this OperadorController */
/* @var $model Operador */

$this->breadcrumbs=array(
	'Operadores'=>array('index'),
	$model->ID_OPERADOR,
);

$this->menu=array(
	array('label'=>'Listar operadores', 'url'=>array('index')),
	array('label'=>'Crear operadores', 'url'=>array('create')),
	array('label'=>'Actualizar operadores', 'url'=>array('update', 'id'=>$model->ID_OPERADOR)),
	array('label'=>'Borrrar operadores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_OPERADOR),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar operadores', 'url'=>array('admin')),
);
?>

<h1>Vista operador <?php echo $model->NOMBRE_OPERADOR; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NOMBRE_OPERADOR',
	),
)); ?>
