<?php
/* @var $this PonderacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ponderaciones',
);

$this->menu=array(
	array('label'=>'Crear ponderación', 'url'=>array('create')),
	array('label'=>'Administrar ponderación', 'url'=>array('admin')),
);
?>

<h1>Ponderaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
