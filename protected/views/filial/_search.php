<?php
/* @var $this FilialController */
/* @var $model Filial */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_FILIAL'); ?>
		<?php echo $form->textField($model,'NOMBRE_FILIAL',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PAIS'); ?>
		<?php echo $form->textField($model,'PAIS',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->