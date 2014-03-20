<?php
/* @var $this TrabajoController */
/* @var $model Trabajo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	//'id' => 'search-form',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


        <fieldset>
        <legend>Información del avión</legend>
        
        
<!--
      <div class="listBuilder">
            <div class="span-9">

            <?php /*
$this->widget('application.extensions.multiselects.XMultiSelects',array(
				    'leftTitle'=>'Flotas disponibles',
				    'leftName'=>'Flota[disponible][]',
				    'leftList'=>CHtml::listData(Flota::model()->findAll(),'ID_FLOTA','NOMBRE_FLOTA'),
				    'rightTitle'=>'Flotas seleccionadas',
				    'rightName'=>'Flota[selected][]',
				    'rightList'=>CHtml::listData(Flota::model()->findAll(array('limit'=>0)),'ID_FLOTA','NOMBRE_FLOTA'),
				    'size'=>9,
				    'width'=>'100px',
				));
*/
			?>

			
            </div>
      </div>
-->

		<div class="raw">
            <?php echo $form->label($model,'FLOTA_ID_FLOTA'); ?>
            <?php echo $form->ListBox($model,'FLOTA_ID_FLOTA', CHtml::listData(Flota::model()->findAll(), 'NOMBRE_FLOTA', 'NOMBRE_FLOTA'), array('class'=>'listBuilder','empty' => null,'multiple'=>'multiple','style' => 'height: 100px; vertical-align: middle;')); ?>
        </div>
   
           <div class="raw">
            <?php
	            echo CHtml::ajaxSubmitButton('>>',Yii::app()->createUrl('avion/loadMat'),
                    array(
                        'type'=>'POST',
                        'data' => 'js:$(".listBuilder").serialize()',                                     
                        'update'=>'#Avion_mat_multi',           
                    ),array('class'=>'row buttons',));

            ?>
           </div>
          <div class="raw">
          <?php echo $form->label($model,'mat_multi');
	       		echo CHtml :: activeListbox($model,'mat_multi',array(), array('multiple' => 'multiple',
	       						'style' => 'height: 100px; vertical-align: middle;'));  
         ?>
         </div>
         
        </fieldset>
        
 
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
