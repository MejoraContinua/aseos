<?php
/* @var $this EstadoController */
/* @var $model Estado */

$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->ID_ESTADO=>array('view','id'=>$model->ID_ESTADO),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar estados de aseo', 'url'=>array('index')),
	array('label'=>'Crear estados de aseo', 'url'=>array('create')),
	array('label'=>'Ver estados de aseo', 'url'=>array('view', 'id'=>$model->ID_ESTADO)),
	array('label'=>'Administrar estados de aseo', 'url'=>array('admin')),
);
?>

<h1>Actualizar estado <?php echo $model->NOMBRE_ESTADO; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>