<?php
/* @var $this CRITICOSController */
/* @var $model CRITICOS */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'criticos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'FLOTA_ID_FLOTA'); ?>
		 <?php echo $form->dropDownList($model, 'FLOTA_ID_FLOTA', CHtml::listData(Flota::model()->findAll(), 'ID_FLOTA', 'NOMBRE_FLOTA'), array('empty' => 'Seleccione')); ?>
		
		<?php echo $form->error($model,'FLOTA_ID_FLOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ASEO_ID_ASEO'); ?>
		<?php echo $form->dropDownList($model, 'ASEO_ID_ASEO', CHtml::listData(Aseo::model()->findAll(), 'ID_ASEO', 'TIPO_ASEO'), array('empty' => 'Seleccione')); ?>
                
		<?php echo $form->error($model,'ASEO_ID_ASEO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LIMITE1'); ?>
		<?php echo $form->textField($model,'LIMITE1'); ?>
		<?php echo $form->error($model,'LIMITE1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LIMITE2'); ?>
		<?php echo $form->textField($model,'LIMITE2'); ?>
		<?php echo $form->error($model,'LIMITE2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LIMITE3'); ?>
		<?php echo $form->textField($model,'LIMITE3'); ?>
		<?php echo $form->error($model,'LIMITE3'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->