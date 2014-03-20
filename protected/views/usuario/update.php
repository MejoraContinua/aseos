<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->BP=>array('view','id'=>$model->BP),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar usuarios', 'url'=>array('index')),
	array('label'=>'Crear usuarios', 'url'=>array('create')),
	array('label'=>'Ver usuario', 'url'=>array('view', 'id'=>$model->BP)),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Actualizar datos de usuario <?php echo $model->BP; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>