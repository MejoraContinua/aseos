<?php
/* @var $this FlotaController */
/* @var $model Flota */

$this->breadcrumbs=array(
	'Flotas'=>array('index'),
	$model->ID_FLOTA,
);

$this->menu=array(
	array('label'=>'Listar flotas', 'url'=>array('index')),
	array('label'=>'Crear flota', 'url'=>array('create')),
	array('label'=>'Actualizar flotas', 'url'=>array('update', 'id'=>$model->ID_FLOTA)),
	array('label'=>'Eliminar flota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_FLOTA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar flotas', 'url'=>array('admin')),
);
?>

<h1>Flota <?php echo $model->NOMBRE_FLOTA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'NOMBRE_FLOTA',
	),
)); ?>
