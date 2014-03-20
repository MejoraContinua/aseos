<?php
/* @var $this LugarController */
/* @var $model Lugar */

$this->breadcrumbs=array(
	'Lugares'=>array('index'),
	$model->ID_LUGAR=>array('view','id'=>$model->ID_LUGAR),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar lugares', 'url'=>array('index')),
	array('label'=>'Crear lugares', 'url'=>array('create')),
	array('label'=>'Ver lugar', 'url'=>array('view', 'id'=>$model->ID_LUGAR)),
	array('label'=>'Administrar lugares', 'url'=>array('admin')),
);
?>

<h1>Actualizar lugar <?php echo $model->LUGAR; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>