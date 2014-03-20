<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->ID_ITEM,
);

$this->menu=array(
	array('label'=>'Listar items', 'url'=>array('index')),
	array('label'=>'Crear items', 'url'=>array('create')),
	array('label'=>'Actualizar items', 'url'=>array('update', 'id'=>$model->ID_ITEM)),
	array('label'=>'Borrar items', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_ITEM),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar items', 'url'=>array('admin')),
);
?>

<h1>Vista item <?php echo $model->NOMBRE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NOMBRE',
                array(
                            'name'=> 'EVALUACION_ID_EVALUACION',
                            'header'=>'Evaluacion',
                            'value'=>$model->eVALUACIONIDEVALUACION->NOMBRE, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
	),
)); ?>
