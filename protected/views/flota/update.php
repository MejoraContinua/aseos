<?php
/* @var $this FlotaController */
/* @var $model Flota */

$this->breadcrumbs=array(
	'Flotas'=>array('index'),
	$model->ID_FLOTA=>array('view','id'=>$model->ID_FLOTA),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar flotas', 'url'=>array('index')),
	array('label'=>'Crear flota', 'url'=>array('create')),
	array('label'=>'Ver flota', 'url'=>array('view', 'id'=>$model->ID_FLOTA)),
	array('label'=>'Administrar flotas', 'url'=>array('admin')),
);
?>

<h1>Actualizar flota <?php echo $model->NOMBRE_FLOTA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>