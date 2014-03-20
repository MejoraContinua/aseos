<?php
/* @var $this NotaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Notas',
);

$this->menu=array(
	array('label'=>'Create Nota', 'url'=>array('create')),
	array('label'=>'Manage Nota', 'url'=>array('admin')),
);
?>

<h1>Notas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
