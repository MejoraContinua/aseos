<?php
/* @var $this CRITICOSController */
/* @var $model CRITICOS */

$this->breadcrumbs=array(
	'Críticos'=>array('index'),
	$model->ID_CRITICOS,
);

$this->menu=array(
	array('label'=>'Listar críticos', 'url'=>array('index')),
	array('label'=>'Crear crítico', 'url'=>array('create')),
	array('label'=>'Actualizar crítico', 'url'=>array('update', 'id'=>$model->ID_CRITICOS)),
	array('label'=>'Borrar crítico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_CRITICOS),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar crítico', 'url'=>array('admin')),
);
?>

<h1>Vista crítico #<?php echo $model->ID_CRITICOS; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
                            'name'=> 'FLOTA_ID_FLOTA',
                            'header'=>'Flota',
                            'value'=>$model->fLOTAIDFLOTA->NOMBRE_FLOTA, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                 array(
                            'name'=> 'ASEO_ID_ASEO',
                            'header'=>'Aseo',
                            'value'=>$model->aSEOIDASEO->TIPO_ASEO, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
		'LIMITE1',
		'LIMITE2',
		'LIMITE3',
	),
)); ?>
