<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'BP'); ?>
		<?php echo $form->textField($model,'BP'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE'); ?>
		<?php echo $form->textField($model,'NOMBRE',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NIVEL_USUARIO'); ?>
		<?php echo $form->textField($model,'NIVEL_USUARIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PASSWORD'); ?>
		<?php echo $form->passwordField($model,'PASSWORD',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FILIAL_ID_FILIAL'); ?>
		<?php echo $form->textField($model,'FILIAL_ID_FILIAL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->