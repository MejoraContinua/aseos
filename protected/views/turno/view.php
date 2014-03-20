<?php
/* @var $this TurnoController */
/* @var $model Turno */

$this->breadcrumbs=array(
	'Turnos'=>array('index'),
	$model->ID_TURNO,
);

$this->menu=array(
	array('label'=>'List Turno', 'url'=>array('index')),
	array('label'=>'Create Turno', 'url'=>array('create')),
	array('label'=>'Update Turno', 'url'=>array('update', 'id'=>$model->ID_TURNO)),
	array('label'=>'Delete Turno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_TURNO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Turno', 'url'=>array('admin')),
);
?>

<h1>View Turno #<?php echo $model->ID_TURNO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_TURNO',
		'FECHA',
		'TIPO_TURNO_ID_TIPO_TURNO',
	),
)); ?>
