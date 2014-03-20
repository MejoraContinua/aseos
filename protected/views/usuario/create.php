<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar usuarios', 'url'=>array('index')),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Crear usuarios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>