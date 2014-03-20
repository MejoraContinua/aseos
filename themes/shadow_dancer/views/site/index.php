<?php
    $baseUrl = Yii::app()->theme->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCSSFile($baseUrl . '/css/index.css');
?>


<?php $this->pageTitle=Yii::app()->name;
      $today= date('Y-m-d');
      $from= date('Y-m-d', strtotime($today . ' - 1 day'));
      $to= date('Y-m-d', strtotime($from . ' + 2 day'));
      //esta queda intocable
      $variable= $model->findAll(array('condition'=>'PLANIFICADO=1 AND FECHA BETWEEN :from_date AND :to_date','order'=>'FECHA','params'=>array(':from_date'=>$from,':to_date'=>$to)));
      $pendientes= $model->findAll(array('condition'=>'ESTADO_ID_ESTADO=2','order'=>'FECHA'));
      $planificados= $model->findAll(array('condition'=>'PLANIFICADO=1 AND FECHA=:date','order'=>'FECHA','params'=>array(':date'=>$today)));
      $ok=$model->findAll(array('condition'=>'ESTADO_ID_ESTADO=1 AND FECHA=:date','order'=>'FECHA','params'=>array(':date'=>$today)));
      $desasignados= $model->findAll(array('condition'=>'ESTADO_ID_ESTADO>=3 AND ESTADO_ID_ESTADO<=8 AND FECHA=:date','order'=>'FECHA','params'=>array('date'=>$today)));
      ?>




<div class="centre">
<a href="index.php?r=trabajo/adminPend">
<div class="boxes">
    <p>Pendientes</p>
    <label><?php echo count($pendientes);?></label>
</div>
</a>

<?php $baseUrl = Yii::app()->theme->baseUrl;
            $imageId = "img";
            $normalImageSrc = "{$baseUrl}/images/linea.png";

            $img = "<div style=\"float:left; padding-top: 20px;\"><img style=\"vertical-align:-10px;\" id=\"{$imageId}\" class=\"showDialogEvaluacion\" src=\"{$normalImageSrc}\"/ ></div>";
            echo $img;
?>

<a href="index.php?r=trabajo/adminPlan">
<div class="boxes">

    <p>Planificados</p>
    <label><?php echo count($planificados);?></label>

</div>
</a>
<a href="index.php?r=trabajo/adminOk">
<div class="boxes">

    <p>OK</p>
    <label><?php echo count($ok);?></label>

</div>
</a>
<a href="index.php?r=trabajo/adminDesa">
<div class="boxes">
    <p>Desasignados</p>
    <label><?php echo count($desasignados);?></label>
</div>
</a>
</div>

<div class="hr" style="margin-top: 280px;"><hr /></div>

<?php
echo $this->renderPartial('gantt',array(
                                        'model'=>$model,
                                        'variable'=>$variable,
                                        'from'=>$from,
                                        'to'=>$to,
                                        false,true));
                                       ?>








