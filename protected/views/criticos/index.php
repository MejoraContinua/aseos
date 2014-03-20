<?php
/* @var $this CRITICOSController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Críticos',
);

$this->menu=array(
	array('label'=>'Crear crítico', 'url'=>array('create')),
	array('label'=>'Administrar crítico', 'url'=>array('admin')),
);
?>

<h1>Críticos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
