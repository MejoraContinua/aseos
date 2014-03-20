<?php
/* @var $this CRITICOSController */
/* @var $model CRITICOS */

$this->breadcrumbs=array(
	'Críticos'=>array('index'),
	$model->ID_CRITICOS=>array('view','id'=>$model->ID_CRITICOS),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar críticos', 'url'=>array('index')),
	array('label'=>'Crear crítico', 'url'=>array('create')),
	array('label'=>'Vista crítico', 'url'=>array('view', 'id'=>$model->ID_CRITICOS)),
	array('label'=>'Administrar crítico', 'url'=>array('admin')),
);
?>

<h1>Actualizar crítico <?php echo $model->ID_CRITICOS; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>