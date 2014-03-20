<?php

$baseUrl = Yii::app()->theme->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/jquery.css');
  
$this->pageTitle=Yii::app()->name . ' - Críticos';
$this->breadcrumbs=array(
	'Críticos',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){

	$('#avion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");?>

<h1>Críticos</h1>


<?php echo CHtml::submitButton('Filtros', array('class'=>'search-button','style'=>'background: url(/themes/shadow_dancer/images/small_icons/search-icon.png) no-repeat 6px 1px; padding-left: 24px; vertical-align: bottom;')); ?>


<div class="search-form" style="display: none;">
<?php $this->renderPartial('_searchCriticos',array(
	'model'=>$model,
)); ?>
</div>

<div class="CGridViewContainer">
    <div class="span-20">
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'avion-grid',
	'dataProvider'=>$model->searchAvion(),
	//'filter'=>$model,
	'columns'=> array(
                        array(
                            'name'=>'MATRICULA',
                            'type'=>'raw',
                            'filter'=>$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                'model'=>$model,
                                'attribute'=>'MATRICULA',
                                'source'=>$this->createUrl('request/suggestMatricula'),
                                'options'=>array(
                                    'focus'=>"js:function(event, ui) {
                                        $('#".CHtml::activeId($model,'MATRICULA')."').val(ui.item.value);
                                    }",
                                    'select'=>"js:function(event, ui) {
                                        $.fn.yiiGridView.update('avion-grid', {
                                            data: $('#avion-grid .filters input, #avion-grid .filters select').serialize()
                                        });
                                    }"
                                ),
                            ),true),
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                        array(
                            'name'=> 'FLOTA_ID_FLOTA',
                            'header'=>'Flota',
                            'value'=>'$data->fLOTAIDFLOTA->NOMBRE_FLOTA', // this will access the current group's 1st member and give out the firstname of that member
                            'filter'=>Flota::model()->options,
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                             ),
                        array(
                            'name'=>'alfombra_count',
                            'value'=>function($data){

                                            if(Criticos::model()->exists("ASEO_ID_ASEO=2 AND FLOTA_ID_FLOTA='".$data->FLOTA_ID_FLOTA."'")){
                                                $lim1 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>2))->LIMITE1;
                                                $lim2 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>2))->LIMITE2;
                                                $lim3 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>2))->LIMITE3;
                                                
                                                
                                                if($data->alfombra_count>$lim3)
                                                    $value= CHtml::link($data->alfombra_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>2),array("style"=>"color: red;font-weight:bold;font-size:medium;"));
                                                elseif($data->alfombra_count>$lim2)
                                                    $value= CHtml::link($data->alfombra_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>2),array("style"=>"color: orange;font-weight:bold;font-size:medium; "));
                                                else
                                                    $value= CHtml::link($data->alfombra_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>2),array("style"=>"color: green;font-weight:bold;font-size:medium;"));
                                                return $value;
                                            }
                                        $value="N/A";
                                        return $value; 
                                     },
                            'type'=>'raw',
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                        array(
                            'name'=>'fuselaje_count',
                            'value'=>function($data){

                                            if(Criticos::model()->exists("ASEO_ID_ASEO=4 AND FLOTA_ID_FLOTA='".$data->FLOTA_ID_FLOTA."'")){
                                                $lim1 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>4))->LIMITE1;
                                                $lim2 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>4))->LIMITE2;
                                                $lim3 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>4))->LIMITE3;
                                                
                                                
                                                if($data->fuselaje_count>$lim3)
                                                    $value= CHtml::link($data->fuselaje_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>4),array("style"=>"color: red;font-weight:bold;font-size:medium;"));
                                                elseif($data->fuselaje_count>$lim2)
                                                    $value= CHtml::link($data->fuselaje_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>4),array("style"=>"color: orange;font-weight:bold;font-size:medium; "));
                                                else
                                                    $value= CHtml::link($data->fuselaje_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>4),array("style"=>"color: green;font-weight:bold;font-size:medium;"));
                                                return $value;
                                            }
                                        $value="N/A";
                                        return $value; 
                                     },
                            'type'=>'raw',
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                        array(
                            'name'=>'profundo_count',
                            'value'=>function($data){

                                            if(Criticos::model()->exists("ASEO_ID_ASEO=5 AND FLOTA_ID_FLOTA='".$data->FLOTA_ID_FLOTA."'")){
                                                $lim1 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>5))->LIMITE1;
                                                $lim2 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>5))->LIMITE2;
                                                $lim3 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>5))->LIMITE3;
                                                
                                                
                                                if($data->profundo_count>$lim3)
                                                    $value= CHtml::link($data->profundo_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>5),array("style"=>"color: red;font-weight:bold;font-size:medium;"));
                                                elseif($data->profundo_count>$lim2)
                                                    $value= CHtml::link($data->profundo_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>5),array("style"=>"color: orange;font-weight:bold;font-size:medium; "));
                                                else
                                                    $value= CHtml::link($data->profundo_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>5),array("style"=>"color: green;font-weight:bold;font-size:medium;"));
                                                return $value;
                                            }
                                         $value="N/A";           
                                        return $value; 
                                     },
                            'type'=>'raw',
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                                             array(
                            'name'=>'tapiz_count',
                            'value'=>function($data){

                                            if(Criticos::model()->exists("ASEO_ID_ASEO=6 AND FLOTA_ID_FLOTA='".$data->FLOTA_ID_FLOTA."'")){
                                                $lim1 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>6))->LIMITE1;
                                                $lim2 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>6))->LIMITE2;
                                                $lim3 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>6))->LIMITE3;
                                                
                                                
                                                if($data->tapiz_count>$lim3)
                                                    $value= CHtml::link($data->tapiz_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>6),array("style"=>"color: red;font-weight:bold;font-size:medium;"));
                                                elseif($data->tapiz_count>$lim2)
                                                    $value= CHtml::link($data->tapiz_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>6),array("style"=>"color: orange;font-weight:bold;font-size:medium; "));
                                                else
                                                    $value= CHtml::link($data->tapiz_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>6),array("style"=>"color: green;font-weight:bold;font-size:medium;"));
                                                return $value;
                                            }
                                        $value="N/A";        
                                        return $value; 
                                     },
                            'type'=>'raw',
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                         array(
                            'name'=>'banos_count',
                            'value'=>function($data){

                                            if(Criticos::model()->exists("ASEO_ID_ASEO=8 AND FLOTA_ID_FLOTA='".$data->FLOTA_ID_FLOTA."'")){
                                                $lim1 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>8))->LIMITE1;
                                                $lim2 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>8))->LIMITE2;
                                                $lim3 = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>$data->FLOTA_ID_FLOTA,"ASEO_ID_ASEO"=>8))->LIMITE3;
                                                
                                                
                                                if($data->banos_count>$lim3)
                                                    $value= CHtml::link($data->banos_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>8),array("style"=>"color: red;font-weight:bold;font-size:medium;"));
                                                elseif($data->banos_count>$lim2)
                                                    $value= CHtml::link($data->banos_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>8),array("style"=>"color: orange;font-weight:bold;font-size:medium; "));
                                                else
                                                    $value= CHtml::link($data->banos_count,array("site/bajar",'avion'=>$data->MATRICULA,'aseo'=>8),array("style"=>"color: green;font-weight:bold;font-size:medium;"));
                                                return $value;
                                            }
                                        $value="N/A";
                                        return $value; 
                                     },
                            'type'=>'raw',
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),

        ),

        'afterAjaxUpdate'=>"function(){
            jQuery('#".CHtml::activeId($model,'MATRICULA')."').autocomplete({
                'delay':300,
                'minLength':1,
                'source':'".$this->createUrl('request/suggestMatricula')."',
                'focus':function(event, ui) {
                    $('#".CHtml::activeId($model,'MATRICULA')."').val(ui.item.value);
                },
                'select':function(event, ui) {
                    $.fn.yiiGridView.update('avion-grid', {
                        data: $('#avion-grid .filters input, #avion-grid .filters select').serialize()
                    });
                }
            });
        }",
)); 
    
?>
    </div>
   </div>
