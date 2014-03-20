<?php
/* @var $this LugarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lugares',
);

$this->menu=array(
	array('label'=>'Crear lugar', 'url'=>array('create')),
	array('label'=>'Administrar lugares', 'url'=>array('admin')),
);
?>

<h1>Lugares</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
