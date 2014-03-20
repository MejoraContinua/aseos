<?php
$this->pageTitle = Yii::app()->name . ' - Ingreso de datos';
$this->breadcrumbs = array(
    'Ingreso de datos',
);
?>
<h1>Ingreso de datos</h1>
<div class="container showgrid">
    <div class="form">
        <div class="span-20">

            <?php
            $datePickerConfig = array('name' => 'dayofwork',
                'language' => 'es',
                'htmlOptions' => array(
                    'size' => '10', // textField size
                    'maxlength' => '10', // textField maxlength
                ),
                'options' => array(
                    'showAnim' => 'fold',
            ));



            Yii::import('ext.jqrelcopy.JQRelcopy');
            $this->widget('ext.jqrelcopy.JQRelcopy', array(
                'id' => 'copylink',
                'removeText' => 'Quitar', //uncomment to add remove link
                //htmlOptions of the remove link
                'removeHtmlOptions' => array('style' => 'color:red'),
                'jsAfterNewId' => JQRelcopy::afterNewIdDatePicker($datePickerConfig),
                //options of the plugin, see http://www.andresvidal.com/labs/relcopy.html
                'options' => array(
                    //A class to attach to each copy
                    'copyClass' => 'newcopy',
                    // The number of allowed copies. Default: 0 is unlimited
                    'limit' => 5,
                    //Option to clear each copies text input fields or textarea
                    'clearInputs' => true,
                    //A jQuery selector used to exclude an element and its children
                    'excludeSelector' => '.skipcopy',
                //add the datapicker functionality to the cloned datepicker with the same options
                //Additional HTML to attach at the end of each copy.
                //'append'=>CHtml::tag('span',array('class'=>'hint'),'Usted puede remover este aseo'),
                )
            ));
            ?>

            <div class="span-20">
                <p class="note">Campos con<span class="required">*</span> son requeridos.</p>
                <table>
                    <tr>
                        <td><?php echo CHtml::label('Matrícula avión:', ''); ?>
                             <?php echo CHtml::dropDownList('matricula','',  CHtml::listData(Avion::model()->findAll(), 'MATRICULA', 'MATRICULA'),
                                    array('empty' => ' ',
                                        'ajax' => array(
                                            'type'=>'POST',
                                            'url'=>CController::createUrl('Flota/GetFlotaByMat'), 
                                            'dataType'=>'json',
                                            'data'=>array('matricula'=>'js:this.value'),  
                                            'success'=>'function(data) {
                                                $("#flotaId").val(data[0].NOMBRE_FLOTA);
                                            }',
                             ))); 
                             ?>
                        </td>
                        <td><?php echo CHtml::label('Flota:', '');
                                  echo CHtml::textField('flotaId', '', array('style' => 'width:65px','readonly'=>'true'));?></td>
                    </tr>
                </table>
            </div>      

            <hr size=”1″ />

            <div class="row copy">
                <table>
                    <tr>
                        <td><?php echo CHtml::label('Planificado:', ''); ?>
                            <?php echo CHtml::checkBox('planificado[]', false, array('value'=>1, 'uncheckValue'=>0)); ?>
                        </td>
                        <td><?php echo CHtml::label('OT:', ''); ?>
                            <?php echo CHtml::textField('ot[]', '', array('style' => 'width:65px','maxlength'=>6)); ?></td>
                        <td><?php echo CHtml::label('Estado:', ''); ?>
                            <?php echo CHtml::dropDownList('estado[]', 'ID_ESTADO', CHtml::listData(Estado::model()->findAll(), 'ID_ESTADO', 'NOMBRE_ESTADO'), array('empty' => ' ')); ?></td>
                        <td><?php echo CHtml::label('Aseo:', ''); ?>
                            <?php echo CHtml::dropDownList('aseo[]', 'ID_ASEO', CHtml::listData(Aseo::model()->findAll(), 'ID_ASEO', 'TIPO_ASEO'), array('empty' => ' ')); ?></td>
                        <td><?php echo CHtml::label('Nota:', ''); ?>
                            <?php echo CHtml::textField('nota[]', '', array('style' => 'width:30px')); ?></td>
                        <td><?php echo CHtml::label('Lugar:', ''); ?>
                            <?php echo CHtml::dropDownList('lugar[]', 'ID_LUGAR', CHtml::listData(Lugar::model()->findAll(), 'ID_LUGAR', 'LUGAR'), array('empty' => ' ')); ?></td></td>
                        
                    </tr>
                    
                    <tr>
                      <td><?php echo CHtml::label('Hora inicio:', ''); ?>
                            <?php echo CHtml::textField('hora_inicio[]', '', array('style' => 'width:70px','maxlength'=>5)); ?></td>
                        <td><?php echo CHtml::label('Hora término:', ''); ?>
                            <?php echo CHtml::textField('hora_termino[]', '', array('style' => 'width:70px','maxlength'=>5)); ?></td>
                        <td><?php echo CHtml::label('Fecha:', ''); ?>
                            <?php $this->widget('zii.widgets.jui.CJuiDatePicker', $datePickerConfig); ?></td>
                        
                    </tr>
                    <tr>
                        <td colspan="10"><?php echo CHtml::label('Comentario:', ''); ?>
                            <?php echo CHtml::textArea('textarea', '', array('rows' => '1', 'cols' => '30')); ?></td>
                    </tr>
                       
                </table>
               
                <hr size=”1″ />
            </div>
            
             <a id="copylink" href="#" rel=".copy"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/add.png"> Añadir nuevo trabajo</a>
        </div>


    </div><!-- form -->


</div>
<br />
