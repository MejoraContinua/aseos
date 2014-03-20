<?php
/* @var $this TipoTurnoController */
/* @var $model TipoTurno */

$this->breadcrumbs=array(
	'Tipo Turnos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar tipos de turno', 'url'=>array('index')),
	array('label'=>'Administrar tipos de turno', 'url'=>array('admin')),
);
?>

<h1>Crear tipo de turno</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>