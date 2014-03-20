<?php
/* @var $this TipoTurnoController */
/* @var $model TipoTurno */

$this->breadcrumbs=array(
	'Tipo Turnos'=>array('index'),
	$model->ID_TIPO_TURNO=>array('view','id'=>$model->ID_TIPO_TURNO),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar tipos de turno', 'url'=>array('index')),
	array('label'=>'Crear tipos de turno', 'url'=>array('create')),
	array('label'=>'Ver tipo de turno', 'url'=>array('view', 'id'=>$model->ID_TIPO_TURNO)),
	array('label'=>'Administrar tipos de turno', 'url'=>array('admin')),
);
?>

<h1>Actualizar tipo de turno <?php echo $model->TIPO; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>