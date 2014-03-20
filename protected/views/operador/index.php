<?php
/* @var $this OperadorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Operadors',
);

$this->menu=array(
	array('label'=>'Crear operadores', 'url'=>array('create')),
	array('label'=>'Administrar operadores', 'url'=>array('admin')),
);
?>

<h1>Operadores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
