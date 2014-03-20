<?php
/* @var $this NotaController */
/* @var $model Nota */

$this->breadcrumbs=array(
	'Notas'=>array('index'),
	$model->ID_NOTA,
);

$this->menu=array(
	array('label'=>'List Nota', 'url'=>array('index')),
	array('label'=>'Create Nota', 'url'=>array('create')),
	array('label'=>'Update Nota', 'url'=>array('update', 'id'=>$model->ID_NOTA)),
	array('label'=>'Delete Nota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_NOTA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nota', 'url'=>array('admin')),
);
?>

<h1>View Nota #<?php echo $model->ID_NOTA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_NOTA',
		'NOTA',
		'ITEM_ID_ITEM',
		'TRABAJO_ID_TRABAJO',
	),
)); ?>
