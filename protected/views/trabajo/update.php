<?php
/* @var $this TrabajoController */
/* @var $model Trabajo */

$this->breadcrumbs=array(
	'Trabajo'=>array('index'),
	$model->ID_TRABAJO=>array('view','id'=>$model->ID_TRABAJO),
	'Actualizar',
);

//$this->menu=array(
//	array('label'=>'Listar aseos realizar', 'url'=>array('index')),
//	array('label'=>'Ingresar aseo', 'url'=>array('create')),
//	array('label'=>'Vista aseos', 'url'=>array('view', 'id'=>$model->ID_TRABAJO)),
//	array('label'=>'Administrar aseos', 'url'=>array('admin')),
//);
?>
<?php  echo $this->renderPartial('_form', array('model'=>$model,
                                                'modelT'=>$modelT,
                                                'success'=>$success,
        )); ?>