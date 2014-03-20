<?php
/* @var $this FlotaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Flotas',
);

$this->menu=array(
	array('label'=>'Crear flota', 'url'=>array('create')),
	array('label'=>'Administrar flotas', 'url'=>array('admin')),
);
?>

<h1>Flotas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
