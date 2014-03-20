<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	 <fieldset>
        <legend>Información personal</legend>
        <div class="raw">
		<?php echo $form->labelEx($model,'BP'); ?>
		<?php echo $form->textField($model,'BP',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'BP'); ?>
        </div>
        

	<div class="raw">
		<?php echo $form->labelEx($model,'NOMBRE'); ?>
		<?php echo $form->textField($model,'NOMBRE'); ?>
		<?php echo $form->error($model,'NOMBRE'); ?>
	</div>

	<div class="raw">
		<?php echo $form->labelEx($model,'newPassword'); ?>
		<?php echo $form->passwordField($model,'newPassword',array('size'=>25,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'newPassword'); ?>
	</div>
        <br>
	<div class="raw">
		<?php echo $form->labelEx($model,'NIVEL_USUARIO'); ?>
                <?php echo $form->dropDownList($model, 'NIVEL_USUARIO',array(1=>'Administrador',2=>'Lectura y escritura',3=>'Lectura')); ?>
		<?php echo $form->error($model,'NIVEL_USUARIO'); ?>
	</div>


	<div class="raw">
		<?php echo $form->labelEx($model,'FILIAL_ID_FILIAL'); ?>
		<?php echo $form->dropDownList($model, 'FILIAL_ID_FILIAL', CHtml::listData(Filial::model()->findAll(), 'ID_FILIAL', 'NOMBRE_FILIAL'), array('empty' => 'Seleccione')); ?>
		<?php echo $form->error($model,'FILIAL_ID_FILIAL'); ?>
	</div>
        
         </fieldset>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->