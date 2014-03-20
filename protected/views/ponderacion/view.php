<?php
/* @var $this PonderacionController */
/* @var $model Ponderacion */

$this->breadcrumbs=array(
	'Ponderaciones'=>array('index'),
	$model->ID_PONDERACION,
);

$this->menu=array(
	array('label'=>'Listar ponderaciones', 'url'=>array('index')),
	array('label'=>'Crear ponderación', 'url'=>array('create')),
	array('label'=>'Actualizar ponderación', 'url'=>array('update', 'id'=>$model->ID_PONDERACION)),
	array('label'=>'Borrar ponderación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_PONDERACION),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar ponderación', 'url'=>array('admin')),
);
?>

<h1>Vista Ponderacion #<?php echo $model->ID_PONDERACION; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PONDERACION',
		array(
                            'name'=> 'ASEO_ID_ASEO',
                            'header'=>'Aseo',
                            'value'=>$model->aSEOIDASEO->TIPO_ASEO, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
		array(
                            'name'=> 'FLOTA_ID_FLOTA',
                            'header'=>'Flota',
                            'value'=>$model->fLOTAIDFLOTA->NOMBRE_FLOTA, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                        array(
                            'name'=> 'EVALUACION_ID_EVALUACION',
                            'header'=>'Evaluacion',
                            'value'=>$model->eVALUACIONIDEVALUACION->NOMBRE, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
	),
)); ?>
