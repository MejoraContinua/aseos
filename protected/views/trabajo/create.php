<?php
/* @var $this TrabajoController */
/* @var $model Trabajo */

$this->pageTitle=Yii::app()->name . ' - Ingresar aseo';
$this->breadcrumbs=array(
	'Trabajos'=>array('index'),
        'Ingresar',
);


?>
<?php echo $this->renderPartial('_form', array('model'=>$model,
											   'modelT'=>$modelT,'success' => $success)); ?>
