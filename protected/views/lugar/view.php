<?php
/* @var $this LugarController */
/* @var $model Lugar */

$this->breadcrumbs=array(
	'Lugares'=>array('index'),
	$model->ID_LUGAR,
);

$this->menu=array(
	array('label'=>'Listar lugares', 'url'=>array('index')),
	array('label'=>'Crear lugar', 'url'=>array('create')),
	array('label'=>'Actualizar lugar', 'url'=>array('update', 'id'=>$model->ID_LUGAR)),
	array('label'=>'Eliminar lugar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_LUGAR),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar lugares', 'url'=>array('admin')),
);
?>

<h1>Vista lugar <?php echo $model->LUGAR; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'LUGAR',
                 array(
                            'name'=> 'FILIAL_ID_FILIAL',
                            'header'=>'Filial',
                            'value'=>$model->fILIALIDFILIAL->NOMBRE_FILIAL, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
	),
)); ?>
