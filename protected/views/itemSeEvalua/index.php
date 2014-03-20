<?php
/* @var $this ItemSeEvaluaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Item se evalua',
);

$this->menu=array(
	array('label'=>'Crear Item a evaluar', 'url'=>array('create')),
	array('label'=>'Administrar item a evaluar', 'url'=>array('admin')),
);
?>

<h1>Item se evalua</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
