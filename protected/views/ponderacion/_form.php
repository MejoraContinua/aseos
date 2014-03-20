<?php
/* @var $this PonderacionController */
/* @var $model Ponderacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ponderacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PONDERACION'); ?>
		<?php echo $form->textField($model,'PONDERACION'); ?>
		<?php echo $form->error($model,'PONDERACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ASEO_ID_ASEO'); ?>
		<?php echo $form->dropDownList($model, 'ASEO_ID_ASEO', CHtml::listData(Aseo::model()->findAll(), 'ID_ASEO', 'TIPO_ASEO'), array('empty' => 'Seleccione')); ?>
		<?php echo $form->error($model,'ASEO_ID_ASEO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FLOTA_ID_FLOTA'); ?>
		 <?php echo $form->dropDownList($model, 'FLOTA_ID_FLOTA', CHtml::listData(Flota::model()->findAll(), 'ID_FLOTA', 'NOMBRE_FLOTA'), array('empty' => 'Seleccione')); ?>
		<?php echo $form->error($model,'FLOTA_ID_FLOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EVALUACION_ID_EVALUACION'); ?>
		<?php echo $form->dropDownList($model, 'EVALUACION_ID_EVALUACION', CHtml::listData(Evaluacion::model()->findAll(), 'ID_EVALUACION', 'NOMBRE'), array('empty' => 'Seleccione')); ?>
		<?php echo $form->error($model,'EVALUACION_ID_EVALUACION'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->