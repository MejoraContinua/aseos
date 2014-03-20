<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->ID_ITEM=>array('view','id'=>$model->ID_ITEM),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar items', 'url'=>array('index')),
	array('label'=>'Crear item', 'url'=>array('create')),
	array('label'=>'Vista item', 'url'=>array('view', 'id'=>$model->ID_ITEM)),
	array('label'=>'Administrar items', 'url'=>array('admin')),
);
?>

<h1>Actualizar item <?php echo $model->NOMBRE; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>