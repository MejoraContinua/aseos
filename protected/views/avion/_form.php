<?php
/* @var $this AvionController */
/* @var $model Avion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'avion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'MATRICULA'); ?>
		<?php echo $form->textField($model,'MATRICULA',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'MATRICULA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FLOTA_ID_FLOTA'); ?>
                <?php echo $form->dropDownList($model, 'FLOTA_ID_FLOTA', CHtml::listData(Flota::model()->findAll(), 'ID_FLOTA', 'NOMBRE_FLOTA'), array('empty' => 'Seleccione')); ?>
		<?php //echo $form->textField($model,'FLOTA_ID_FLOTA'); ?>
		<?php echo $form->error($model,'FLOTA_ID_FLOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OPERADOR_ID_OPERADOR'); ?>
		<?php echo $form->dropDownList($model, 'OPERADOR_ID_OPERADOR', CHtml::listData(Operador::model()->findAll(), 'ID_OPERADOR', 'NOMBRE_OPERADOR'), array('empty' => 'Seleccione')); ?>
		<?php //echo $form->textField($model,'OPERADOR_ID_OPERADOR'); ?>
		<?php echo $form->error($model,'OPERADOR_ID_OPERADOR'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->