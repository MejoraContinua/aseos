<?php
/* @var $this TrabajoController */
/* @var $model Trabajo */
/* @var $form CActiveForm */
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl . '/css/jquery.css');
$cs->registerCSSFile($baseUrl . '/css/semantic.css');
?>
<div class="span-special">
<div class="form semantic">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'trabajo-form',
        'enableAjaxValidation' => false,
        'enableClientValidation'=>true,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        ),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    $this->widget('application.extensions.ajaxvalidationmessages.EAjaxValidationMessages', array(
        'errorCssClass' => 'clsError',
        'errorMessageCssClass' => 'clsErrorMessage',
        'errorSummaryCssClass' => 'clsErrorSummary'));
    ?>


    <fieldset>

    <legend>Información personal</legend>
        <?php $model->USUARIO_BP = Yii::app()->user->getId(); ?>
        <?php echo $form->hiddenField($model, 'USUARIO_BP'); ?>
    <div class="raw">
        <?php Usuario::model()->NOMBRE = Usuario::model()->FindByPk(Yii::app()->user->getId())->NOMBRE; ?>
        <?php echo $form->labelEx(Usuario::model(), 'NOMBRE'); ?>
        <?php echo $form->textField(Usuario::model(), 'NOMBRE', array('style' => 'width:100px', 'maxlength' => 30, 'readonly' => true)); ?>
    </div>

    <div class="raw">
        <?php echo $form->labelEx($modelT, 'FECHA'); ?>
            <?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $modelT,
                            'attribute' => 'FECHA',
                            'name' => $modelT->FECHA, // This is how it works for me.
                            'value' => $modelT->FECHA,
                            'language' => 'es',
                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'dateFormat' => 'yy-mm-dd',

                                'showAnim' => 'drop',
                            ),
                            'htmlOptions' => array(
                                'style' => 'width:74px',
                                'readonly' => 'readonly',
                            ),
                        )); ?>
<!--        <?php $posts2=$modelT->findAll(array('order'=>'FECHA ASC'));
                      echo $form->dropDownList($modelT, 'FECHA', CHtml::listData($posts2, 'ID_TURNO', 'FECHA',function($posts2) {
                                                return CHtml::encode($posts2->tIPOTURNOIDTIPOTURNO->TIPO);
                                        }), array('empty' => 'Seleccione'));?> -->
            <?php  echo $form->error($modelT, 'FECHA'); ?>
    </div
>
    <div class="raw">
      <?php echo $form->labelEx($modelT, 'TIPO_TURNO_ID_TIPO_TURNO'); ?>
      <?php echo $form->dropDownList($modelT, 'TIPO_TURNO_ID_TIPO_TURNO', CHtml::listData(TipoTurno::model()->findAll(), 'ID_TIPO_TURNO', 'TIPO'), array('empty' => 'Seleccione'));?>
      <?php echo $form->error($modelT, 'TIPO_TURNO_ID_TIPO_TURNO');?>
    </div>

  </fieldset>


  <fieldset>

    <legend>Información del avión</legend>

    <div class="raw">
        <?php echo $form->labelEx($model, 'AVION_MATRICULA');
        $posts=Avion::model()->findAll(array('order' => 'FLOTA_ID_FLOTA ASC'));
        echo $form->dropDownList($model, 'AVION_MATRICULA', CHtml::listData($posts, 'MATRICULA', 'MATRICULA',function($posts) {
                                                return CHtml::encode($posts->fLOTAIDFLOTA->NOMBRE_FLOTA);
                                        }), array('empty' => 'Seleccione',
                    'ajax' => array(
	                    'type' => 'POST',
	                    'url' => CController::createUrl('Flota/GetFlotaByMat'),
	                    'dataType' => 'json',
	                    'data' => array('matricula' => 'js:this.value',
	                                    ),
	                    'success' => 'function(data) {
	                                                    $("#flotaId").val(data.flota[0].NOMBRE_FLOTA);
	                                                    idFlota = data.flota[0].ID_FLOTA;
	                                                  }',
                        // 'error' => 'function() {alert("_form.php")}'
                    )));?>
        <?php echo $form->error($model, 'AVION_MATRICULA'); ?>
    </div>

    <div class="raw">
        <?php echo CHtml::label('Flota:', ''); ?>
        <?php echo CHtml::textField('flotaId', '', array('style' => 'width:53px', 'readonly' => 'readonly')); ?>
    </div>

  </fieldset>

<?php $this->renderPartial('_form1',array('form'=>$form,'model'=>$model,'modelT'=>$modelT,'success'=>$success)); ?>


      <div class="SubmitButton" id="SubButton" style="vertical-align:-10px; float: left; padding-right: 10px;">
        <?php echo CHtml::submitButton('Guardar', array('name' => 'buttonSubmit','style'=>'width: 95px; height: 35px; background: url(/themes/shadow_dancer/images/small_icons/disk.png) no-repeat 15px 7px; padding-left: 24px; vertical-align: bottom;')); ?>
      </div>

    <div class="HideSubmitButton" id="HideSubButton" style="display: none; vertical-align:-10px; float: left; padding-right: 10px;">
        <?php echo CHtml::submitButton('Guardar', array('name' => 'update','style'=>'width: 95px; height: 35px;background: url(/themes/shadow_dancer/images/small_icons/disk.png) no-repeat 15px 7px; padding-left: 24px; vertical-align: bottom;')); ?>
    </div>

    <div>
        <?php echo CHtml::resetButton('Resetear', array('name' => 'update','style'=>'width: 95px; height: 35px;background: url(/themes/shadow_dancer/images/small_icons/arrow_refresh.png) no-repeat 12px 7px; padding-left: 24px; vertical-align: bottom;')); ?>
    </div>

<?php $this->endWidget(); ?>


    </div>

    <script type="text/javascript">

    $(document).ready(function() {

        var aseoTemp= <?php  print('$("#' . CHtml::activeId($model, 'ASEO_ID_ASEO') . '").val();'); ?>
        if(aseoTemp==7 || aseoTemp==5 ||  aseoTemp==2);
        else
        	$("#showDialogEvaluacion").hide();


        var idFlota = null;
        var idAseo = null;
        var currentTime = new Date()
        var month = currentTime.getMonth() + 1;
        var day = currentTime.getDate();
        var year = currentTime.getFullYear();
        if (day < 10) {
            day = '0' + day
        }
        if (month < 10) {
            month = '0' + month
        }
        currentTime = month + '/' + day + '/' + year;
        var active = $("#<?php echo CHtml::activeId($modelT, 'FECHA')?>");
        var turno = $("#<?php echo CHtml::activeId($modelT, 'FECHA_TURNO')?>");

        console.log("active : ");
        console.log(active);

        if(active.val() == '') {
          active.val(year + "-" + month + "-" + day);

        }

        if(turno.val() == '') {
            turno.val(year + "-" + month + "-" + day);
        }



        //console.log($("#<?php echo CHtml::activeId($model, 'AVION_MATRICULA'); ?> option:selected").text());
        $.post(
                '<?php echo $this->createUrl("Flota/GetFlotaByMat"); ?>',
                {'matricula': $("#<?php echo CHtml::activeId($model, 'AVION_MATRICULA'); ?> option:selected").text()},
        function(data) {
            $("#flotaId").val(data.flota[0].NOMBRE_FLOTA);
        }
        , "json");
    });

    function updateTag(var1) {
        final = 0;
        count = 0;
        total = 0;
        notaFinal = 0;
        var1 = var1 + 1;

        for (var j = 0; j < window.var3.length; j++) {
            if (window.var3[j]['evaluacion_id_evaluacion'] == var1) {
                count = count + 1;
                if (parseInt(window.arreglo[j]) == 101)
                    total = total + 0;
                else
                    total = total + parseInt(window.arreglo[j]);
            }

        }

        final = Number((total / count).toFixed(0));
        window.temp[var1] = (final * window.var2[var1 - 1]['ponderacion']) / 100;

        for (var i = 1; i <= window.tamano; i++) {
            if (window.temp[i] != null)
                notaFinal = Number((notaFinal + window.temp[i]).toFixed(0));
        }
        var1 = var1 - 1;
        variable1 = "notaPond[" + var1 + "]";

        document.getElementById(variable1).innerHTML = final + "%";
        $('#NotaFinal').val(notaFinal + "%");
<?php print('$("#' . CHtml::activeId($model, 'CALIFICACION') . '").val(notaFinal);'); ?>


    }
</script>
</div>




