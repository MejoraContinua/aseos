<?php
/* @var $this FilialController */
/* @var $model Filial */

$this->breadcrumbs=array(
	'Filiales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar filiales', 'url'=>array('index')),
	array('label'=>'Administrar filiales', 'url'=>array('admin')),
);
?>

<h1>Crear filial</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>