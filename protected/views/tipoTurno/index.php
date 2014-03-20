<?php
/* @var $this TipoTurnoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Turnos',
);

$this->menu=array(
	array('label'=>'Crear tipos de turno', 'url'=>array('create')),
	array('label'=>'Administrar tipos de turno', 'url'=>array('admin')),
);
?>

<h1>Tipo turnos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
