<?php
/* @var $this AseoController */
/* @var $model Aseo */

$this->breadcrumbs=array(
	'Aseos'=>array('index'),
	$model->ID_ASEO,
);

$this->menu=array(
	array('label'=>'Listar tipos de aseos', 'url'=>array('index')),
	array('label'=>'Crear tipo de aseo', 'url'=>array('create')),
	array('label'=>'Actualizar tipo de aseo', 'url'=>array('update', 'id'=>$model->ID_ASEO)),
	array('label'=>'Eliminar tipo de aseo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_ASEO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar tipos de aseo', 'url'=>array('admin')),
);
?>

<h1>Vista tipo de aseo <?php echo $model->TIPO_ASEO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TIPO_ASEO',
	),
)); ?>
