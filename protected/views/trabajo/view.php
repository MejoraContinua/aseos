<?php
/* @var $this TrabajoController */
/* @var $model Trabajo */

$this->breadcrumbs=array(
	'Trabajos'=>array('index'),
	$model->ID_TRABAJO,
);

$this->menu=array(
	array('label'=>'Listar aseos', 'url'=>array('index')),
	array('label'=>'Crear aseo', 'url'=>array('create')),
	array('label'=>'Actualizar aseo', 'url'=>array('update', 'id'=>$model->ID_TRABAJO)),
	array('label'=>'Borrar aseo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_TRABAJO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar aseos', 'url'=>array('admin')),
);
?>

<h1>Información aseo número <?php echo $model->ID_TRABAJO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_TRABAJO',
		'OT',
		'AVION_MATRICULA',
		'USUARIO_BP',
		 array(
                    'name'=>'PLANIFICADO',
                    'value'=> $model->PLANIFICADO ? ($model->PLANIFICADO ? "Si" : "No") : NULL,
                     ),
//                array(
//                            'name'=> 'FILIAL_ID_FILIAL',
//                            'header'=>'Filial',
//                            'value'=>$model->fILIALIDFILIAL->NOMBRE_FILIAL, // this will access the current group's 1st member and give out the firstname of that member
//                            'htmlOptions'=>array('style' => 'text-align: center;'),
//                        ),
		'HORA_INICIO',
		'HORA_TERMINO',
		'COMENTARIO',
		'FECHA',
		'CALIFICACION',
                array(
                            'name'=> 'ESTADO_ID_ESTADO',
                            'header'=>'Estado',
                            'value'=>$model->eSTADOIDESTADO->NOMBRE_ESTADO, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                array(
                            'name'=> 'LUGAR_ID_LUGAR',
                            'header'=>'Lugar',
                            'value'=>$model->LUGAR_ID_LUGAR ? $model->lUGARIDLUGAR->LUGAR : NULL, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                array(
                            'name'=> 'ASEO_ID_ASEO',
                            'header'=>'Aseo',
                            'value'=>$model->ASEO_ID_ASEO ? $model->aSEOIDASEO->TIPO_ASEO : NULL, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                array(
		            'name'=>'TURNO_ID_TURNO',
		            'header'=>'Turno',
		            'value'=>$model->TURNO_ID_TURNO ? $model->tURNOIDTURNO->FECHA." ".$model->tURNOIDTURNO->tIPOTURNOIDTIPOTURNO->TIPO : NULL,
		            'htmlOptions'=>array('style' => 'text-align: center;'),
		         ),
                array( 

                'label'=>'Foto 1',
                'type'=>'raw',
                'value'=>$model->ARCHIVO1 ? html_entity_decode(CHtml::image($model->ARCHIVO1,'alt',array('width'=>541))) : NULL,
                ),
                array( 

                'label'=>'Foto 2',
                'type'=>'raw',
                'value'=>$model->ARCHIVO2 ? html_entity_decode(CHtml::image($model->ARCHIVO2,'alt',array('width'=>541))) : NULL,
                ), 
                array( 

                'label'=>'Foto 3',
                'type'=>'raw',
                'value'=>$model->ARCHIVO3 ? html_entity_decode(CHtml::image($model->ARCHIVO3,'alt',array('width'=>541))) : NULL,
                ),
	),
)); ?>
