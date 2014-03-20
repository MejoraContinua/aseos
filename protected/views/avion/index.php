<?php
/* @var $this AvionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Avions',
);

$this->menu=array(
	array('label'=>'Crear avión', 'url'=>array('create')),
	array('label'=>'Administrar aviones', 'url'=>array('admin')),
);
?>

<h1>Aviones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
