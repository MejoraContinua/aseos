<?php

$baseUrl = Yii::app()->theme->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/jquery.css');
  
$this->pageTitle=Yii::app()->name . ' - Administración';
$this->breadcrumbs=array(
	'Administración',
);

?>
<h1>Página de administración</h1>

<?php echo CHtml::link('Administrar aviones',array('avion/index')); ?><br>
<?php echo CHtml::link('Administrar flotas',array('flota/index')); ?><br>
<?php echo CHtml::link('Administrar tipos de aseos',array('aseo/index')); ?><br>
<?php echo CHtml::link('Administrar estados de aseos',array('estado/index')); ?><br>
<?php echo CHtml::link('Administrar operadores',array('operador/index')); ?><br>
<?php echo CHtml::link('Administrar lugares',array('lugar/index')); ?><br>
<?php echo CHtml::link('Administrar filiales',array('filial/index')); ?><br>
<?php echo CHtml::link('Administrar usuarios',array('usuario/index')); ?><br>
<?php echo CHtml::link('Administrar tipos de turno',array('tipoTurno/index')); ?><br>
<?php echo CHtml::link('Administrar evaluaciones',array('evaluacion/index')); ?><br>
<?php echo CHtml::link('Administrar ítems',array('item/index')); ?><br>
<?php echo CHtml::link('Administrar Items a evaluar',array('itemSeEvalua/index')); ?><br>
<?php echo CHtml::link('Administrar ponderaciones',array('ponderacion/index')); ?><br>
<?php echo CHtml::link('Administrar críticos',array('criticos/index')); ?><br>



