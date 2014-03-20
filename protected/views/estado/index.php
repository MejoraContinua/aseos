<?php
/* @var $this EstadoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estados',
);

$this->menu=array(
	array('label'=>'Crear estados de aseo', 'url'=>array('create')),
	array('label'=>'Administrar estados de aseo', 'url'=>array('admin')),
);
?>

<h1>Estados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
