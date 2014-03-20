<?php

$baseUrl = Yii::app()->theme->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/jquery.css');
$this->pageTitle=Yii::app()->name . ' - Bajar evaluaciones';
$this->breadcrumbs=array(
	'Bajar evaluaciones',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");?>

<h1>Bajar evaluaciones</h1>

<?php echo CHtml::submitButton('Filtros', array('class'=>'search-button','style'=>'background: url(/themes/shadow_dancer/images/small_icons/search-icon.png) no-repeat 6px 1px; padding-left: 24px; vertical-align: bottom;')); ?>

<div class="search-form" style="display: none;">
<?php $this->renderPartial('_searchEvaluaciones',array(
	'model'=>$model,
)); ?>

</div>

<div style="">
<?php 
	list($dataProvider,$columns) = $model->searchItem();

	$this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'item-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>$columns,
	
	));
?>
</div>
<?php
	$baseUrl = Yii::app()->theme->baseUrl; 
    $normalImageSrc = "{$baseUrl}/images/excel.png";
    $image = CHtml::image($normalImageSrc,"",array('style' => 'vertical-align:10px;')).'Descargar datos filtrados';
    echo CHtml::link($image, array('site/DownloadExcelEval'));            
       
?>


