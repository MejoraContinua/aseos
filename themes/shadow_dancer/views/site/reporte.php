<?php  
$this->pageTitle=Yii::app()->name . ' - Envío de reportes';
$this->breadcrumbs=array(
	'Envío de reportes',
);
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
");?>

<h1>Envío de reportes</h1>

<div class="flash-notice">
Para enviar un informe, seleccione la fecha de turno y el tipo de turno
para filtrar los aseos realizados y haga clic en Enviar informe.
</div>

<?php echo CHtml::submitButton('Filtros', array('class'=>'search-button','style'=>'background: url(/themes/shadow_dancer/images/small_icons/search-icon.png) no-repeat 6px 1px; padding-left: 24px; vertical-align: bottom;')); ?>

<div class="search-form">
<?php $this->renderPartial('_search_1',array(
	'model'=>$model,
)); ?>
</div>

<?php 
       
        $baseUrl = Yii::app()->theme->baseUrl; 
        $normalImageSrc = "{$baseUrl}/images/mail.png";
        $image = CHtml::image($normalImageSrc,"",array('style' => 'vertical-align:10px;')).'Enviar informe';
        echo CHtml::link($image, array('site/SendExcel'));  




$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'trabajo-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		'OT',
         array(
            'name'=>'AVION_MATRICULA',
             'value'=>function($data){
                     if($data->AVION==NULL)
                         return "";
                     else{
                         return $data->AVION->MATRICULA;
                     }
            },
        ),
		
        'USUARIO_BP',
        array(
            'name'=>'ESTADO_ID_ESTADO',
            'value'=>function($data){
                     if($data->ESTADO_ID_ESTADO==NULL)
                         return "";
                     else
                         return $data->eSTADOIDESTADO->NOMBRE_ESTADO;
            }
        ),
   
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
	             }
	     ),
       array(
            'name'=>'HORA_TERMINO',
            'value'=>function($data){
                     if($data->HORA_TERMINO==NULL)
                         return "";
                     else{
                         $temp_var= explode(':',$data->HORA_TERMINO);
                         return $temp_var[0].':'.$temp_var[1];
                     }
                         
                     }
      ),
              array(
        'name'=>'PLAN_INICIO',
        
        'value'=>function($data){
	                 if($data->PLAN_INICIO==NULL)
	                     return "";
	                 else{
	                     $temp_var= explode(':',$data->PLAN_INICIO);
	                     return $temp_var[0].':'.$temp_var[1];
	                 }
	             }
	     ),
       array(
            'name'=>'PLAN_TERMINO',
            'value'=>function($data){
                     if($data->PLAN_TERMINO==NULL)
                         return "";
                     else{
                         $temp_var= explode(':',$data->PLAN_TERMINO);
                         return $temp_var[0].':'.$temp_var[1];
                     }
                         
                     }
      ),   
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
                //'ULTIMO_ASEO',
                'CALIFICACION',
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
		
	),
));
                    
 ?>
 
