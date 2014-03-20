<script type="text/javascript">
// close the div in 5 secs
window.setTimeout("closeSuccessDiv();", 3500);

function closeSuccessDiv(){
document.getElementById("success").style.display=" none";
}
</script>


<hr>
    <?php if($success):?>
        <div class="flash-success" id="success" style="display: block;">El aseo ha sido guardado con éxito.</div>
    <?php endif;?>

  <fieldset>
      <legend>Información del Aseo</legend>
      <div class="raw">
          <?php echo $form->labelEx($model, 'ASEO_ID_ASEO'); ?>

        <?php
        // echo $form->dropDownList($model, 'ASEO_ID_ASEO', CHtml::listData(Aseo::model()->findAll(), 'ID_ASEO', 'TIPO_ASEO'), array('empty' => 'Seleccione', //'disabled'=>'disabled',
        //     'ajax' => array(
        //         'type' => 'POST',
        //         'url' => CController::createUrl('Aseo/GetTipoByPond'),
        //         'dataType' => 'json',
        //         'data' => array('id_aseo' => 'js:this.value',
        //                         'id_flota' => 'js:idFlota'),
        //         'success' => 'function(data) {

        //                   idAseo = data.id_aseo;
        //                   if(data.resultado=="1"){
        //                       console.log(data.resultado);
        //                       $("#showDialogEvaluacion").show();
        //                       $("#' . CHtml::activeId($model, 'CALIFICACION') . '").show();
        //                       $("#CALIFICACION_LABEL").show();

        //                   }
        //                   else{
        //                       $("#showDialogEvaluacion").hide();
        //                       $("#' . CHtml::activeId($model, 'CALIFICACION') . '").hide();
        //                       $("#CALIFICACION_LABEL").hide();
        //                   }
        //                }',
        // )));


        //Gonzalo
        echo $form->dropDownList($model, 'ASEO_ID_ASEO', CHtml::listData(Aseo::model()->findAll(), 'ID_ASEO', 'TIPO_ASEO'), array('empty' => 'Seleccione'));
        ?>
        <!--<?php echo $form->error($model, 'ASEO_ID_ASEO'); ?>-->
      </div>


      <div class="raw">
          <?php echo $form->labelEx($model, 'LUGAR_ID_LUGAR'); ?>
          <?php
          $pot=Lugar::model()->findAll('filial_id_filial=:filial', array(':filial' => Usuario::model()->findByPk(Yii::app()->user->getId())->FILIAL_ID_FILIAL));
          //$pot=Lugar::model()->findAll();
          echo $form->dropDownList($model, 'LUGAR_ID_LUGAR', CHtml::listData($pot, 'ID_LUGAR', 'LUGAR',function($pot) {
                                                                    return CHtml::encode($pot->fILIALIDFILIAL->NOMBRE_FILIAL);
                                                                    }), array('empty' => 'Seleccione')); ?>
          <?php echo $form->error($model, 'LUGAR_ID_LUGAR'); ?>
      </div>

      <div class="raw">
          <?php echo $form->labelEx($model, 'PLANIFICADO'); ?>
          <?php echo $form->radioButtonList($model, 'PLANIFICADO', array(1 => 'Si', 0 => 'No'), array('separator' => ' ')); ?>
          <?php echo $form->error($model, 'PLANIFICADO'); ?>
      </div>
  </fieldset>

    <fieldset>
        <legend>Información cronológica</legend>
        <div class="raw">
            <?php echo $form->labelEx($model, 'HORA_INICIO'); ?>
            <?php $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
                           'model' => $model,
                           'attribute' => 'HORA_INICIO',
                           // additional javascript options for the date picker plugin
                           'options' => array(
                               'showPeriod' => true,
                               'hours' => array('starts' => 0, 'ends' => 23),
                               'minutes' => array('interval' => 1),
                               'showPeriodLabels' => false,
                               'showPeriod' => false,
                               'hourText' => 'Hora',
                               'minuteText' => 'Minuto',
                               'rows' => 6,
                               'showCloseButton' => true,
                               'closeButtonText' => 'Listo',
                           ),
                           'htmlOptions' => array('size' => 5, 'maxlength' => 5, 'readonly' => 'readonly'),
                       )); ?>
            <?php echo $form->error($model, 'HORA_INICIO'); ?>
        </div>
        <div class="raw">
            <?php echo $form->labelEx($model, 'HORA_TERMINO'); ?>
            <?php $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
                        'model' => $model,
                        'attribute' => 'HORA_TERMINO',
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showPeriod' => true,
                            'hours' => array('starts' => 0, 'ends' => 23),
                            'minutes' => array('interval' => 1),
                            'showPeriodLabels' => false,
                            'showPeriod' => false,
                            'hourText' => 'Hora',
                            'minuteText' => 'Minuto',
                            'rows' => 6,
                            'showCloseButton' => true,
                            'closeButtonText' => 'Listo',
                        ),
                        'htmlOptions' => array('size' => 5, 'maxlength' => 5, 'readonly' => 'readonly'),
                    )); ?>
           <?php echo $form->error($model, 'HORA_TERMINO'); ?>
        </div>
        <div class="raw">

        <?php echo $form->labelEx($model, 'PLAN_INICIO'); ?>
            <?php $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
                           'model' => $model,
                           'attribute' => 'PLAN_INICIO',
                           // additional javascript options for the date picker plugin
                           'options' => array(
                               'showPeriod' => true,
                               'hours' => array('starts' => 0, 'ends' => 23),
                               'minutes' => array('interval' => 1),
                               'showPeriodLabels' => false,
                               'showPeriod' => false,
                               'hourText' => 'Hora',
                               'minuteText' => 'Minuto',
                               'rows' => 6,
                               'showCloseButton' => true,
                               'closeButtonText' => 'Listo',
                           ),
                           'htmlOptions' => array('size' => 5, 'maxlength' => 5, 'readonly' => 'readonly'),
                       )); ?>
            <?php echo $form->error($model, 'PLAN_INICIO'); ?>
        </div>
        <div class="raw">
            <?php echo $form->labelEx($model, 'PLAN_TERMINO'); ?>
            <?php $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
                        'model' => $model,
                        'attribute' => 'PLAN_TERMINO',
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showPeriod' => true,
                            'hours' => array('starts' => 0, 'ends' => 23),
                            'minutes' => array('interval' => 1),
                            'showPeriodLabels' => false,
                            'showPeriod' => false,
                            'hourText' => 'Hora',
                            'minuteText' => 'Minuto',
                            'rows' => 6,
                            'showCloseButton' => true,
                            'closeButtonText' => 'Listo',
                        ),
                        'htmlOptions' => array('size' => 5, 'maxlength' => 5, 'readonly' => 'readonly'),
                    )); ?>
           <?php echo $form->error($model, 'PLAN_TERMINO'); ?>
        </div>

        <div class="raw">
            <?php echo $form->labelEx($model, 'FECHA'); ?>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'FECHA',
                'language' => 'es',
                // additional javascript options for the date picker plugin
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'showAnim' => 'fold',
                ),
                'htmlOptions' => array(
                    'style' => 'width:74px',
                    'readonly' => 'readonly',
                ),
            )); ?>
            <?php echo $form->error($model, 'FECHA'); ?>
        </div>
    </fieldset>

    <fieldset>
        <legend>Información de la evaluación</legend>
        <div class="raw">
            <?php echo $form->labelEx($model, 'ESTADO_ID_ESTADO'); ?>
            <?php echo $form->dropDownList($model, 'ESTADO_ID_ESTADO', CHtml::listData(Estado::model()->findAll(), 'ID_ESTADO', 'NOMBRE_ESTADO'), array('empty' => 'Seleccione')); ?>
            <?php echo $form->error($model, 'ESTADO_ID_ESTADO'); ?>
        </div>


        <div class="raw">
            <?php echo $form->labelEx($model, 'OT'); ?>
            <?php echo $form->textField($model, 'OT', array('style' => 'width:50px',

            							 'maxlength' => 6,'onBlur'=>CHtml::ajax(array(
                                                            'url'=>Yii::app()->createUrl('trabajo/SearchOT'),
                                                            'type'=>'post',
                                                            'dataType'=>'json',
                                                            //'data'=>array('title' => 'js:this.value'),
                                                            'success'=>'function(data){
                                                           					if(data[0]=="N");
                                                           					else{
                                                           						alert("OT ingresada ya existe");
                                                           						$("#' . CHtml::activeId($model, 'OT') . '").val("");
                                                           					}
                                                            			}'))
                                                            )
                                       );?>

            <?php echo $form->error($model, 'OT'); ?>
        </div>

        <?php
        if(isset($_GET['id'])){$idtrabajo = $_GET['id'];}else{$idtrabajo = null;}
        ?>
        <div class="raw">
            <?php echo $form->labelEx($model, 'CALIFICACION', array('id' => 'CALIFICACION_LABEL')); ?>
            <?php echo $form->textField($model, 'CALIFICACION', array('style' => 'width:30px', 'maxlength' => 3)); ?>
            <?php $baseUrl = Yii::app()->theme->baseUrl;
            $imageId = "img";
            $normalImageSrc = "{$baseUrl}/images/write.png";

            $img = "<img style=\"vertical-align:-10px;\" id=\"{$imageId}\" class=\"showDialogEvaluacion\" src=\"{$normalImageSrc}\"/ >";

            echo CHtml::ajaxLink($img, $this->createUrl('trabajo/save&id='.$idtrabajo), array(
                'type' => 'POST',
                'data' => 'js:$("#trabajo-form").serialize()',
                'success' => "function(html,textStatus,jqXHR) {
                                     $('#AjaxLoader').hide();
                                    if (html.indexOf('{')==0) {
                                       jQuery('#trabajo-form').ajaxvalidationmessages('show', html);
                                    }
                                    else {
                                       $('#SubButton').hide();
                                       $('#HideSubButton').show();
                                       jQuery('#trabajo-form').ajaxvalidationmessages('hide');
                                       $('#dialogEvaluacion').html(html).dialog('open');

                                       return false;
                                     }
                                 }",
                'error' => "function(html) {
                                    jQuery('#trabajo-form').ajaxvalidationmessages('hide');
                                 }",
                'update' => '#dialogEvaluacion',
                'beforeSend' => 'function(){
                                       $("#AjaxLoader").show();
                                  }'
                    ), array('id' => 'showDialogEvaluacion', 'type' => 'hidden'));
            ?>
        </div>
        <div id="dialogEvaluacion"></div>
        <div id="AjaxLoader" style="display: none">Cargando evaluación<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/spinner.gif"></div>
    </fieldset>

    <fieldset class="coments">
        <legend>Comentarios y fotos</legend>
        <div class="raw">
            <?php echo $form->labelEx($model, 'COMENTARIO',array('style'=>"vertical-align:26px;")); ?>
            <?php echo $form->textArea($model, 'COMENTARIO', array('maxlength' => 255, 'rows' => 3, 'cols' => 70)); ?>
            <?php echo $form->error($model, 'COMENTARIO'); ?>
        </div>

        <div class="raw">
           <?php echo $form->labelEx($model, 'imagen',array('style'=>"vertical-align:top;")); ?>
           <?php $this->widget('CMultiFileUpload', array(
                                    'model'=>$model,
                                    'name' => 'imagen',
                                    'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                                    //'duplicate' => 'Archivo ya existe', // useful, i think
                                    'denied' => 'Tipo de archivo inválido', // useful, i think
                                    'remove'=>Yii::t('ui','Remover'),
                                    'max'=>3,
                                )); ?>
           <?php echo $form->error($model, 'imagen'); ?>
        </div>
    </fieldset>
    <script type="text/javascript">

      //Gonzalo
      $('#Trabajo_ASEO_ID_ASEO').on("change", function() {
        var shouldShow = [5, 7];
        if(shouldShow.indexOf(parseInt(this.value)) != -1) {
          $("#showDialogEvaluacion").fadeIn("fast");
        } else {
          $("#showDialogEvaluacion").fadeOut("fast");
        }
      });
    </script>
