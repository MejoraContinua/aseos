<?php
/* @var $this TipoTurnoController */
/* @var $model TipoTurno */

$this->breadcrumbs=array(
	'Tipo Turnos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TipoTurno', 'url'=>array('index')),
	array('label'=>'Create TipoTurno', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-turno-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar tipos de turno</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipo-turno-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'TIPO',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
