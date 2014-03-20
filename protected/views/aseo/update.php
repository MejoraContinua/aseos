<?php
/* @var $this AseoController */
/* @var $model Aseo */

$this->breadcrumbs=array(
	'Aseos'=>array('index'),
	$model->ID_ASEO=>array('view','id'=>$model->ID_ASEO),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar tipos de aseos', 'url'=>array('index')),
	array('label'=>'Crear tipo de aseo', 'url'=>array('create')),
	array('label'=>'Ver tipo de aseo', 'url'=>array('view', 'id'=>$model->ID_ASEO)),
	array('label'=>'Administrar tipos de aseo', 'url'=>array('admin')),
);
?>

<h1>Actualizar tipo de aseo <?php echo $model->TIPO_ASEO; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>