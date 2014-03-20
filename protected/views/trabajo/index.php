<?php
/* @var $this TrabajoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ingreso de Trabajos',
);

$this->menu=array(
	array('label'=>'Ingresar nuevo trabajo', 'url'=>array('create')),
	array('label'=>'Administrar trabajos', 'url'=>array('admin')),
);
?>

<h1>Aseos realizados</h1>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


