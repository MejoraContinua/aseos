<?php
/* @var $this FilialController */
/* @var $model Filial */

$this->breadcrumbs=array(
	'Filiales'=>array('index'),
	$model->ID_FILIAL=>array('view','id'=>$model->ID_FILIAL),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar filiales', 'url'=>array('index')),
	array('label'=>'Crear filiales', 'url'=>array('create')),
	array('label'=>'Ver filial', 'url'=>array('view', 'id'=>$model->ID_FILIAL)),
	array('label'=>'Administrar filiales', 'url'=>array('admin')),
);
?>

<h1>Actualizar filial <?php echo $model->NOMBRE_FILIAL; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>