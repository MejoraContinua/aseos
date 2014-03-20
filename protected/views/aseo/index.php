<?php
/* @var $this AseoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aseos',
);

$this->menu=array(
	array('label'=>'Crear tipo de aseo', 'url'=>array('create')),
	array('label'=>'Administrar aseos', 'url'=>array('admin')),
);
?>

<h1>Aseos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
