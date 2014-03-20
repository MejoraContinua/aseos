

<?php 
$baseUrl = Yii::app()->theme->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/jquery.css');
?>
<style>
    em{
        float:right;
        background: #FF8500;
        border: 1px solid #A65600;
        color: black;
        padding: 2px 8px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;


    }

</style>

<div class="form" id="evaluacionDialogForm">
    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'nota-form',
    'enableAjaxValidation'=>true,
)); 
    $this->widget('application.extensions.ajaxvalidationmessages.EAjaxValidationMessages',
                    array(
                       'errorCssClass'=>'clsError',
                       'errorMessageCssClass'=>'clsErrorMessage',
                       'errorSummaryCssClass'=>'clsErrorSummary'));?>
    
    



    <?php
            if($nota_real!=0 || $nota_real!=null)
            {
                
                // avisos de revaluacion!
                echo '<div class="flash-error">
                            <b>Este trabajo ya fue evaluado! </b> 
                            Al revaluar se actualizará esta evaluación.
                      </div>';
                echo '<div class="flash-notice">
                            <b>Esta Evaluación posee una calificación total de: '.$nota_real.' '.
                            CHtml::link("<em>REVALUAR AQUI!</em>",array(
                                            "nota/deletess",
                                            "id"=>$id_trabajo),
                                            array("confirm"=>"¿ Esta seguro que desea Revaluar ?")). 
                 '</b></div>';


                #echo '<h1>Este trabajo ya fue evaluado! Su calificacion es '.$nota_real.'</h1>';
                #echo '<h1>Al revaluar perdera la informacion anterior... ';
                //In view:
                #echo CHtml::link("Borrar",array("nota/deletess",
                #                               "id"=>$id_trabajo),
                 #                             array("confirm"=>"Esta seguro que desea Borrar")); 
                #echo CHtml::link(
                 #       "Borrar",
                  #      array("nota/deletess","id"=>$id_trabajo),
                   #     array(
                    #        'update'=>'#resultado',
                     #       )




                            #     );


            } 

        ?>
    <h1 class="note">Campos con<span class="required">*</span> son requeridos.</h1>
    <?php echo $form->errorSummary($model); ?>

    <table valign="top" style="font-size:large;"> 
        <tr>
            <td> <?php echo CHtml::activeLabel(Trabajo::model(), 'ASEO_ID_ASEO'); ?></td>
            <td><?php echo Chtml::textField('tipoAseo', Aseo::model()->FindByPk($id_aseo)->TIPO_ASEO, array('style' => 'width:80px', 'readonly' => 'readonly')); ?></td>

            <td><?php echo CHtml::activeLabel(Flota::model(), 'NOMBRE_FLOTA'); ?></td>
            <td> <?php echo Chtml::textField('nombreFlota', Flota::model()->findByPk($id_flota)->NOMBRE_FLOTA, array('style' => 'width:80px', 'readonly' => 'readonly')); ?></td>    
            <td><?php echo CHtml::label('Nota Final', 'notaFinal'); ?></td>
            <td> <?php echo Chtml::textField('NotaFinal','0%', array('style' => 'width:50px', 'readonly' => 'readonly')); ?></td>
        </tr>
    </table>
    <table valign="top" style="font-size:large;">
 <?php for ($i = 0; $i < count($sql); $i++) {
       
     if((int)$sql[$i]['ponderacion']!=0){
        echo '<tr><td><br></td></tr> 
              <tr>
                    <td><h1>'.CHtml::label($sql[$i]['nombre'].'  ('.$sql[$i]['ponderacion'].'%)', 'nombre', array('id'=>'nombre['.$i.']')).'</h1></td>
                    <td><h1>'.CHtml::label('0%', 'ponderacion',array('id'=>'notaPond['.$i.']')).'</h1></td>
                </tr>';
        for ($j = $i; $j < count($sql2); $j++) {
            if($sql2[$j]['evaluacion_id_evaluacion']==$sql[$i]['id_evaluacion']){
                echo '<tr>
                <td>'. CHtml::label($sql2[$j]['nombre'], 'nombreItem') .'</td>
                <td>'; echo $form->radioButtonList($model,'NOTA', array(0=>'1',25=>'2',50=>'3',75=>'4',100=>'5'), 
                                                            array('name'=>'NOTA['.$j.'][NOTA]',
                                                                  'separator'=>' | ',
                                                                  'onchange'=>'{
                                                                                window.arreglo['.$j.']=$(this).val();
                                                                                updateTag('.$i.');
                                                                                }')).$form->error($model, 'NOTA',array('name'=>'NOTA['.$j.'][NOTA]')).
                '</td>
                </tr>';
             
             $model->ITEM_ID_ITEM=$sql2[$j]['item_id_item'];
             echo $form->hiddenField($model,'ITEM_ID_ITEM',array('name'=>'NOTA['.$j.'][ITEM_ID_ITEM]'));
             
             $model->TRABAJO_ID_TRABAJO=$id_trabajo;
             echo $form->hiddenField($model,'TRABAJO_ID_TRABAJO',array('name'=>'NOTA['.$j.'][TRABAJO_ID_TRABAJO]'));
             echo '<tr><td></td><td id="AjaxLoader'.$j.'" style="display: none; color:red; font-size: small;">Rellenar</td></tr>';
             
            }
        }
       }       
 }?>
    </table>
    <div id="AjaxLoaderS" style="display: none">Guardando evaluación<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/spinner.gif"></div>
    <div id="AjaxLoaderE" style="display: none">Cancelando evaluación<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/spinner.gif"></div>

    <div colspan="2" class="row buttons" <?php if($nota_real!=NULL) echo 'style="display:none"'; ?>>
        <?php echo CHtml::ajaxSubmitButton(Yii::t('nota','Evaluar'),
                                            CHtml::normalizeUrl(array('nota/addnewevaluacion','id_aseo'=>$id_aseo,'id_flota'=>$id_flota,'render'=>false)),
                                            array("success"=>"function(html,textStatus,jqXHR) {
                                                $('#AjaxLoaderS').hide();
                                                    if (html.indexOf('{')==0) {
                                                          
                                                    }
                                                    else {
                                                        $('#dialogEvaluacion').dialog('close');
                                                        
                                                        }
                                                    }",
                                                'error'=>"function(html) {
                        
                                                    jQuery('#nota-form').ajaxvalidationmessages('hide');
                        
                                                }",'beforeSend'=>'js:function(){
                                                   $("#AjaxLoaderS").show();
                                                   for(var i=0;i<window.arreglo.length;i++){
                                                            if(window.arreglo[i]==101){
                                                                $("#AjaxLoaderS").hide();
                                                                $("#AjaxLoader"+i).show();
                                                            }
                                                            else
                                                                $("#AjaxLoader"+i).hide();  
                                                        } 
                                                }'),array('id'=>'closeEvaluacionDialog'));?>
        
        <?php echo CHtml::ajaxSubmitButton(Yii::t('','Cancelar'),
                                            CHtml::normalizeUrl(array('trabajo/Delete','id'=>$id_trabajo,'render'=>false)),
                                            array("success"=>"function(html,textStatus,jqXHR) {
                                                                $('#SubButton').show();
                                                                $('#HideSubButton').hide();
                                                                $('#dialogEvaluacion').dialog('close');
                                                                                                                       
                                                            }",
                                                'beforeSend'=>'js:function(){
                                                   $("#AjaxLoaderE").show();
                                                }'),array('id'=>'cancelEvaluacionDialog'));?>
        
         
    </div>
       
<?php $this->endWidget(); ?>
     <script type="text/javascript">
            window.arreglo = new Array();
            window.global = 1;
            window.notasFinales = new Array();
            window.temp = new Object();
            window.tamano = 0;
            window.var2 = new Array();
            window.var3 = new Array();

            Object.size = function(obj) {
                var size = 0, key;
                for (key in obj) {
                    if (obj.hasOwnProperty(key))
                        size++;
                }
                return size;
            };

            function inicia(variable2, variable3) {
                var i;
                window.var2 = variable3;
                window.var3 = variable2;
                for (i = 0; i < window.var3.length; i++) {
                    window.temp[window.var3[i]['evaluacion_id_evaluacion']] = 0;
                    window.arreglo[i] = 101;
                }
                for (var key in window.temp) {
                    tamano = parseInt(key);
                }

            }
            function updateAll(var2, var3) {
                for (var i = 1; i <= window.tamano; i++) {
                    if (window.temp[i] != null)
                        updateTag(i - 1);
                }

            }
            
            $(document).ready(function() {
                if (window.global == 1) {
                    window.global = 0;
             <?php print("inicia(" . json_encode($sql2) . "," . json_encode($sql) . ");"); ?>
                }
            });
    </script>
</div>