<?php
/* @var $this FlotaController */
/* @var $model Flota */

$this->breadcrumbs=array(
	'Flotas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar flotas', 'url'=>array('index')),
	array('label'=>'Crear flotas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#flota-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar flotas</h1>

<p>
Opcionalmente usted puede entrar un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>)
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'flota-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'NOMBRE_FLOTA',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
