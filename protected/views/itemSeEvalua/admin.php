<?php
/* @var $this ItemSeEvaluaController */
/* @var $model ItemSeEvalua */

$this->breadcrumbs=array(
	'Item Se Evaluas'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Items a evaluar', 'url'=>array('index')),
	array('label'=>'Crear Item a evaluar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#item-se-evalua-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar item a evaluar</h1>

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
	'id'=>'item-se-evalua-grid',
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
            array(
                            'name'=> 'ITEM_ID_ITEM',
                            'header'=>'Item',
                            'value'=>'$data->iTEMIDITEM->NOMBRE', // this will access the current group's 1st member and give out the firstname of that member
                            'filter'=>Item::model()->options,
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ), 
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
