<?php
/* @var $this AseoController */
/* @var $data Aseo */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPO_ASEO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TIPO_ASEO), array('view', 'id'=>$data->ID_ASEO)); ?>
	<br />


</div>