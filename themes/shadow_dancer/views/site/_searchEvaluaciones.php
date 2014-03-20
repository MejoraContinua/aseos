<?php
/* @var $this TrabajoController */
/* @var $model Trabajo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	
        <fieldset>
        <legend>Información del avión</legend>
            <div class="raw">
		<?php echo $form->label($model,'AVION_MATRICULA');  ?>
		<?php $posts2=Avion::model()->findAll(array('order' => 'FLOTA_ID_FLOTA ASC')); 
                      echo $form->dropDownList($model, 'AVION_MATRICULA', CHtml::listData($posts2, 'MATRICULA', 'MATRICULA',function($posts2) {
                                                return CHtml::encode($posts2->fLOTAIDFLOTA->NOMBRE_FLOTA);
                                        }), array('empty' => 'Seleccione'));?>
            </div>
        <div class="raw">
            <?php echo $form->label($model,'flota'); ?>
            <?php //echo $form->dropDownList($model, 'flota', CHtml::listData(Flota::model()->findAll(), 'ID_FLOTA', 'NOMBRE_FLOTA'), array('empty' => 'Seleccione')); ?>
            <?php echo $form->ListBox($model,'flota', CHtml::listData(Flota::model()->findAll(), 'NOMBRE_FLOTA', 'NOMBRE_FLOTA'), array('empty' =>null,'multiple'=>'multiple','style' => 'height: 100px; vertical-align: middle;')); ?>
        </div>
        </fieldset>
        
        <fieldset>
        <legend>Información del aseo</legend>
            <div class="raw">
		<?php echo $form->label($model,'ASEO_ID_ASEO'); ?>
		<?php echo $form->dropDownList($model, 'ASEO_ID_ASEO', CHtml::listData(Aseo::model()->findAll(), 'ID_ASEO', 'TIPO_ASEO'), array('empty' => 'Seleccione'));?>
            </div>
        </fieldset>
    
          
 
<fieldset>
        <legend>Información de la evaluación</legend>
	<div class="raw">
		<?php echo $form->label($model,'CALIFICACION'); ?>
		<?php echo $form->textField($model, 'CALIFICACION', array('style' => 'width:30px', 'maxlength' => 3)); ?>
	</div>
    </fieldset>
 <fieldset>
        <legend>Información cronológica</legend>

	<div class="raw">
		<?php echo $form->label($model,'Buscar por fecha única:'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'FECHA',
                'language' => 'es',
                // additional javascript options for the date picker plugin
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'showAnim' => 'fold',
                ),
                'htmlOptions' => array(
                    'style' => 'width:74px',
                    
                ),
            )); ?>
	</div>
        <div class="raw">
		<?php echo $form->label($model,'ULTIMO_ASEO'); ?>
		<?php echo $form->textField($model,'ULTIMO_ASEO',array('style' => 'width:30px', 'maxlength' => 3)); ?>
	</div>
        <br>
         <div class="raw"> 
        <?php echo $form->label($model,'Búsqueda por rango: Fecha inicial');?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    //'model'=>$model,
                                    'name' => 'Trabajo[date_first]',
                                    'language' => 'es',
                                     'value' => $model->date_first,
                                    // additional javascript options for the date picker plugin
                                    'options'=>array(
                                        'dateFormat' => 'yy-mm-dd',
                                        'showAnim' => 'drop',
                                    ),
                                    'htmlOptions'=>array(
                                        'style'=>'width:74px',
                                    ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
                                ));?>
             </div>
         <div class="raw"> 
             <?php echo $form->label($model,'Fecha término');?>
             <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    //'model'=>$model,
                                    'name' => 'Trabajo[date_last]',
                                    'language' => 'es',
                                     'value' => $model->date_last,
                                    // additional javascript options for the date picker plugin
                                    'options'=>array(
                                        'dateFormat' => 'yy-mm-dd',
                                        'showAnim' => 'drop',
                                    ),
                                    'htmlOptions'=>array(
                                        'style'=>'width:74px',
                                    ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
                                ));?>
        </div> 
 </fieldset>
	


	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->