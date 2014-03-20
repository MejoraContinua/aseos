<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Items',
);

$this->menu=array(
	array('label'=>'Crear item', 'url'=>array('create')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
