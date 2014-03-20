	<div id="mainmenu">
    
<?php
	 if(isset(Yii::app()->user->role) && (Yii::app()->user->role==='admin')){
		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-house.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Inicio", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/index')),

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-write.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Ingreso datos", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/trabajo/create')),
                

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-down.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Aseos", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/bajar')),

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-cabinet.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Evaluaciones", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/bajarevaluaciones')),
                                

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-warning.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Críticos", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/criticos')),
                                
array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-chart2.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Enviar reportes", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/reporte'),'itemOptions'=>array('class'=>'icon_chart')),

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-gears.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Opciones", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/page', 'view'=>'opciones'))
				),
                    'encodeLabel'=>false,
		));
	}
	elseif(isset(Yii::app()->user->role) && (Yii::app()->user->role==='analiz')){
		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-house.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Inicio", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/index')),
                

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-down.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Aseos", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/bajar')),

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-cabinet.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Evaluaciones", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/bajarevaluaciones')),
                                

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-warning.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Críticos", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/criticos')),
                                
array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-chart2.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Enviar reportes", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/reporte'),'itemOptions'=>array('class'=>'icon_chart')),

				),
                    'encodeLabel'=>false,
		));
	}
	else{
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-house.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Inicio", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/index')),

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-write.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Ingreso datos", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/trabajo/create')),
                

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-down.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Aseos", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/bajar')),

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-cabinet.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Evaluaciones", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/bajarevaluaciones')),
                                

array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-warning.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Críticos", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/criticos')),
                                
array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/images/big_icons/icon-chart2.png","",array("width"=>20,"heigth"=>20,'style' => 'vertical-align:10px;')). CHtml::label("  Enviar reportes", "",array('style' => 'vertical-align:15px;')), 'url'=>array('/site/reporte'),'itemOptions'=>array('class'=>'icon_chart')),

				),
                    'encodeLabel'=>false,
		));
	
	}?>
	</div> <!--mainmenu -->