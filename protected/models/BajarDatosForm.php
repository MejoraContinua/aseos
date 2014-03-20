<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class BajarDatosForm extends CFormModel{
    
    public $fechaInicio;
    public $fechaTermino;
    public $flota;
    public $aseo;
    
    public function rules()
    {
        return array(
//            array('username, password', 'required'),
//            array('rememberMe', 'boolean'),
//            array('password', 'authenticate'),
        );
    }
    
    public function attributeLabels()
        {
                return array(
                'fechaInicio'=>'Fecha de Inicio',
                'fechaTermino' => 'Fecha de término',
                'flota' => 'Flota',
                'aseo' => 'Aseo',
                );
        }
    
}
?>
