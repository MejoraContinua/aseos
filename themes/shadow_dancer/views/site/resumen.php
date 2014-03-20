<?php  
$this->pageTitle=Yii::app()->name . ' - Resumen';
$this->breadcrumbs=array(
	'Resumen',
);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'resumen-grid',
	'dataProvider'=>$model->searchResumen()));
?>