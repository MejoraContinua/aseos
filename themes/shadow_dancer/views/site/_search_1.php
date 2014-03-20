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
        <legend>Información personal</legend>
        <div class="raw">
		<?php echo $form->label($model,'Fecha turno: '); 
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'fturno',
                            'name' => 'fturno', // This is how it works for me.
                            'language' => 'es',
                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'dateFormat' => 'yy-mm-dd',
                                'showAnim' => 'drop',
                            ),
                        ));
                echo $form->textField($model,'TURNO_ID_TURNO',array('style'=>'display:none;'));
                ?>
	</div>
         


        <div class="raw">
            <?php echo $form->label($model,'Tipo turno: '); ?>
            <?php echo $form->dropDownList($model, 'tturno',CHtml::listData(TipoTurno::model()->findAll(),'ID_TIPO_TURNO','TIPO'),array('empty' => 'Seleccione'));
               ?>

        </div>
        
        
        </fieldset>
	
        
	
	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->