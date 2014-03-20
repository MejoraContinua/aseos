<?php
/* @var $this CRITICOSController */
/* @var $model CRITICOS */

$this->breadcrumbs=array(
	'Críticos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar críticos', 'url'=>array('index')),
	array('label'=>'Crear crítico', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#criticos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar crítico</h1>

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
	'id'=>'criticos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                            'name'=> 'FLOTA_ID_FLOTA',
                            'header'=>'Flota',
                            'value'=>'$data->fLOTAIDFLOTA->NOMBRE_FLOTA', // this will access the current group's 1st member and give out the firstname of that member
                            'filter'=>Flota::model()->options,
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
                 array(
                            'name'=> 'ASEO_ID_ASEO',
                            'header'=>'Aseo',
                            'value'=>'$data->aSEOIDASEO->TIPO_ASEO', // this will access the current group's 1st member and give out the firstname of that member
                            'filter'=>Aseo::model()->options,
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
		'LIMITE1',
		'LIMITE2',
		'LIMITE3',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
