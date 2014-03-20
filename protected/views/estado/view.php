<?php
/* @var $this EstadoController */
/* @var $model Estado */

$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->ID_ESTADO,
);

$this->menu=array(
	array('label'=>'Listar estados de aseo', 'url'=>array('index')),
	array('label'=>'Crear estados de aseo', 'url'=>array('create')),
	array('label'=>'Actualizar estados de aseo', 'url'=>array('update', 'id'=>$model->ID_ESTADO)),
	array('label'=>'Borrar estados de aseo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_ESTADO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar estados de aseo', 'url'=>array('admin')),
);
?>

<h1>Vista estado <?php echo $model->NOMBRE_ESTADO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NOMBRE_ESTADO',
	),
)); ?>
