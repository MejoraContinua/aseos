<?php
/* @var $this TipoTurnoController */
/* @var $model TipoTurno */

$this->breadcrumbs=array(
	'Tipo Turnos'=>array('index'),
	$model->ID_TIPO_TURNO,
);

$this->menu=array(
	array('label'=>'Listar tipos de turno', 'url'=>array('index')),
	array('label'=>'Crear tipos de turno', 'url'=>array('create')),
	array('label'=>'Actualizar tipos de turno', 'url'=>array('update', 'id'=>$model->ID_TIPO_TURNO)),
	array('label'=>'Eliminar tipos de turno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_TIPO_TURNO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar tipos de turno', 'url'=>array('admin')),
);
?>

<h1>Vista tipo de turno <?php echo $model->TIPO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TIPO',
	),
)); ?>
