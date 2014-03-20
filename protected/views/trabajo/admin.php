<?php
/* @var $this TrabajoController */
/* @var $model Trabajo */
$baseUrl = Yii::app()->theme->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/tables.css');

$this->breadcrumbs=array(
	'Trabajos'=>array('index'),
	'Administrar',
);

//$this->menu=array(
//	array('label'=>'Listar aseos realizados', 'url'=>array('index')),
//	array('label'=>'Ingresar aseo', 'url'=>array('create')),
//);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trabajo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="span-23">
<h1>Administrar aseos</h1>


<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'trabajo-grid',
        
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'OT',
		'AVION_MATRICULA',
        'flota_grilla',
		'USUARIO_BP',
		 array(
                    'name'=>'PLANIFICADO',
                    'filter'=>array(1=>"Si",0=>"No"),
                    'value'=>function($data){
                             if($data->PLANIFICADO==NULL)
                                 return "";
                             else
                                 return @$data->PLANIFICADO ? "Si" : "No";
                    }),
		array(
                    'name'=>'HORA_INICIO',
                    
                    'value'=>function($data){
                             if($data->HORA_INICIO==NULL)
                                 return "";
                             else{

	                             $temp_var= explode(':',$data->HORA_INICIO);
	                             return $temp_var[0].':'.$temp_var[1];
                             }
                                 
                    }),
               array(
                    'name'=>'HORA_TERMINO',
                    
                    'value'=>function($data){
                             if($data->HORA_TERMINO==NULL)
                                 return "";
                             else{

	                             $temp_var= explode(':',$data->HORA_TERMINO);
	                             return $temp_var[0].':'.$temp_var[1];
                             }
                                 
                    }),    
            array(
                    'name'=>'FECHA',
                    
                    'value'=>function($data){
                             if($data->FECHA==NULL)
                                 return "";
                             else{

	                             $temp_var= explode('-',$data->FECHA);
	                             return $temp_var[2].'-'.$temp_var[1].'-'.$temp_var[0];
                             }
                                 
                    }),
		'CALIFICACION',
		array(
                        'name'=>'ESTADO_ID_ESTADO',
                        'value'=> '$data->eSTADOIDESTADO->NOMBRE_ESTADO',
                        'filter'=>  Estado::model()->options),
		array(
                    'name'=>'LUGAR_ID_LUGAR',
                    
                        'value'=> function($data){
                            if($data->LUGAR_ID_LUGAR==NULL)
                                return "";
                            else
                                return $data->lUGARIDLUGAR->LUGAR;
                         },
                   
                    'filter'=>  Lugar::model()->options,
                ),
		 array(
                    'name'=>'ASEO_ID_ASEO',
                     'value'=> function($data){
                            if($data->ASEO_ID_ASEO==NULL)
                                return "";
                            else
                                return $data->aSEOIDASEO->TIPO_ASEO;
                         },
                    
                    'filter'=> Aseo::model()->options,
                ),
         array(
            'name'=>'TURNO_ID_TURNO',
            'value'=>function($data){
                     if($data->TURNO_ID_TURNO==NULL)
                         return "";
                     else{
                         $temp_var= explode('-',$data->tURNOIDTURNO->FECHA);
                         return $temp_var[2].'-'.$temp_var[1].'-'.$temp_var[0].' '.$data->tURNOIDTURNO->tIPOTURNOIDTIPOTURNO->TIPO;
                     }
            },
         ),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>