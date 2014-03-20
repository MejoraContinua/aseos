<?php
/* @var $this AvionController */
/* @var $model Avion */

//$this->breadcrumbs=array(
//	'Avions'=>array('index'),
//	$model->MATRICULA=>array('view','id'=>$model->MATRICULA),
//	'Update',
//);

$this->menu=array(
	array('label'=>'Listar aviones', 'url'=>array('index')),
	array('label'=>'Crear aviones', 'url'=>array('create')),
	array('label'=>'Ver avión', 'url'=>array('view', 'id'=>$model->MATRICULA)),
	array('label'=>'Administrar aviones', 'url'=>array('admin')),
);
?>

<h1>Actualizar avión <?php echo $model->MATRICULA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>