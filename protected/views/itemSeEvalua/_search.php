<?php
/* @var $this ItemSeEvaluaController */
/* @var $model ItemSeEvalua */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="row">
		<?php echo $form->label($model,'FLOTA_ID_FLOTA'); ?>
		<?php echo $form->dropDownList($model, 'FLOTA_ID_FLOTA', CHtml::listData(Flota::model()->findAll(), 'ID_FLOTA', 'NOMBRE_FLOTA'), array('empty' => 'Seleccione')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->label($model,'ASEO_ID_ASEO'); ?>
		<?php echo $form->dropDownList($model, 'ASEO_ID_ASEO', CHtml::listData(Aseo::model()->findAll(), 'ID_ASEO', 'TIPO_ASEO'), array('empty' => 'Seleccione')); ?>
                
	</div>

	<div class="row">
		<?php echo $form->label($model,'ITEM_ID_ITEM'); ?>
		<?php echo $form->dropDownList($model, 'ITEM_ID_ITEM', CHtml::listData(Item::model()->findAll(), 'ID_ITEM', 'NOMBRE'), array('empty' => 'Seleccione')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->