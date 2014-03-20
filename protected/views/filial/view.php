<?php
/* @var $this FilialController */
/* @var $model Filial */

$this->breadcrumbs=array(
	'Filiales'=>array('index'),
	$model->ID_FILIAL,
);

$this->menu=array(
	array('label'=>'Listar filiales', 'url'=>array('index')),
	array('label'=>'Crear filial', 'url'=>array('create')),
	array('label'=>'Actualizar filial', 'url'=>array('update', 'id'=>$model->ID_FILIAL)),
	array('label'=>'Eliminar filial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_FILIAL),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar filiales', 'url'=>array('admin')),
);
?>

<h1>Vista filial <?php echo $model->NOMBRE_FILIAL; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NOMBRE_FILIAL',
		'PAIS',
	),
)); ?>
