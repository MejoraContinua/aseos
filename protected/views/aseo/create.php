<?php
/* @var $this AseoController */
/* @var $model Aseo */

$this->breadcrumbs=array(
	'Aseos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar aseos', 'url'=>array('index')),
	array('label'=>'Administrar aseos', 'url'=>array('admin')),
);
?>

<h1>Crear tipo de aseo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>