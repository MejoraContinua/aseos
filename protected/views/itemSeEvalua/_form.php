<?php
/* @var $this ItemSeEvaluaController */
/* @var $model ItemSeEvalua */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-se-evalua-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

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
		<?php echo $form->labelEx($model,'ITEM_ID_ITEM'); ?>
                <?php 
                    $pot=Item::model()->findAll();
                    echo $form->dropDownList($model, 'ITEM_ID_ITEM', CHtml::listData($pot, 'ID_ITEM', 'NOMBRE',function($pot) {
                                                                    return CHtml::encode($pot->eVALUACIONIDEVALUACION->NOMBRE);
                                                                    }), array('empty' => 'Seleccione')); ?>
		<?php echo $form->error($model,'ITEM_ID_ITEM'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->