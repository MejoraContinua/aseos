<?php
/* @var $this AvionController */
/* @var $model Avion */

$this->breadcrumbs=array(
	'Avions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar aviones', 'url'=>array('index')),
	array('label'=>'Crear aviones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#avion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar aviones</h1>

<p>
Opcionalmente usted puede entrar un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>)</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'avion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'MATRICULA',
                 array(
                            'name'=> 'FLOTA_ID_FLOTA',
                            'header'=>'Flota',
                            'value'=>'$data->fLOTAIDFLOTA->NOMBRE_FLOTA', // this will access the current group's 1st member and give out the firstname of that member
                            'filter'=>Flota::model()->options,
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                array(
                            'name'=> 'OPERADOR_ID_OPERADOR',
                            'header'=>'Operador',
                            'value'=>'$data->oPERADORIDOPERADOR->NOMBRE_OPERADOR', // this will access the current group's 1st member and give out the firstname of that member
                            'filter'=>Operador::model()->options,
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
