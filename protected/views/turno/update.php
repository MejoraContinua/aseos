<?php
/* @var $this TurnoController */
/* @var $model Turno */

$this->breadcrumbs=array(
	'Turnos'=>array('index'),
	$model->ID_TURNO=>array('view','id'=>$model->ID_TURNO),
	'Update',
);

$this->menu=array(
	array('label'=>'List Turno', 'url'=>array('index')),
	array('label'=>'Create Turno', 'url'=>array('create')),
	array('label'=>'View Turno', 'url'=>array('view', 'id'=>$model->ID_TURNO)),
	array('label'=>'Manage Turno', 'url'=>array('admin')),
);
?>

<h1>Update Turno <?php echo $model->ID_TURNO; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>