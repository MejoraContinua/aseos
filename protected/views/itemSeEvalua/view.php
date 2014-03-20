<?php
/* @var $this ItemSeEvaluaController */
/* @var $model ItemSeEvalua */

$this->breadcrumbs=array(
	'Item Se Evalua'=>array('index'),
	$model->ID_ISE,
);

$this->menu=array(
	array('label'=>'Listar Items a evaluar', 'url'=>array('index')),
	array('label'=>'Crear Item a evaluar', 'url'=>array('create')),
	array('label'=>'Actualizar item a evaluar', 'url'=>array('update', 'id'=>$model->ID_ISE)),
	array('label'=>'Borrar item a evaluar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_ISE),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar item a evaluar', 'url'=>array('admin')),
);
?>

<h1>Vista item a evaluar #<?php echo $model->ID_ISE; ?></h1>

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
            array(
                            'name'=> 'ITEM_ID_ITEM',
                            'header'=>'Item',
                            'value'=>$model->iTEMIDITEM->NOMBRE, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),        
		
	),
)); ?>

