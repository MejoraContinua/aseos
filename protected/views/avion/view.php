<?php
/* @var $this AvionController */
/* @var $model Avion */

$this->breadcrumbs=array(
	'Avions'=>array('index'),
	$model->MATRICULA,
);

$this->menu=array(
	array('label'=>'Listar aviones', 'url'=>array('index')),
	array('label'=>'Crear aviones', 'url'=>array('create')),
	array('label'=>'Actualizar aviones', 'url'=>array('update', 'id'=>$model->MATRICULA)),
	array('label'=>'Borrar aviones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->MATRICULA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar aviones', 'url'=>array('admin')),
);
?>

<h1>Vista avión <?php echo $model->MATRICULA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'MATRICULA',
                array(
                            'name'=> 'FLOTA_ID_FLOTA',
                            'header'=>'Flota',
                            'value'=>$model->fLOTAIDFLOTA->NOMBRE_FLOTA, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                array(
                            'name'=> 'OPERADOR_ID_OPERADOR',
                            'header'=>'Operador',
                            'value'=>$model->oPERADORIDOPERADOR->NOMBRE_OPERADOR, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
	),
)); ?>
