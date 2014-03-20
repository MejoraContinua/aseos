<?php
/* @var $this FilialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Filials',
);

$this->menu=array(
	array('label'=>'Crear filiales', 'url'=>array('create')),
	array('label'=>'Administrar filiales', 'url'=>array('admin')),
);
?>

<h1>Filiales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
