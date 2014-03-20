<?php

/**
 * This is the model class for table "trabajo".
 *
 * The followings are the available columns in table 'trabajo':
 * @property integer $ID_TRABAJO
 * @property integer $OT
 * @property string $AVION_MATRICULA
 * @property integer $USUARIO_BP
 * @property integer $PLANIFICADO
 * @property string $HORA_INICIO
 * @property string $HORA_TERMINO
 * @property string $PLAN_INICIO
 * @property string $PLAN_TERMINO
 * @property string $COMENTARIO
 * @property string $FECHA
 * @property integer $CALIFICACION
 * @property integer $ULTIMO_ASEO
 * @property integer $ESTADO_ID_ESTADO
 * @property integer $LUGAR_ID_LUGAR
 * @property integer $ASEO_ID_ASEO
 * @property integer $TURNO_ID_TURNO
 * @property string $ARCHIVO1
 * @property string $ARCHIVO2
 * @property string $ARCHIVO3
 * @property string $flota
 *
 *
 * The followings are the available model relations:
 * @property Nota[] $notas
 * @property Aseo $aSEOIDASEO
 * @property Avion $aVIONMATRICULA
 * @property Estado $eSTADOIDESTADO
 * @property Lugar $lUGARIDLUGAR
 * @property Turno $tURNOIDTURNO
 * @property Usuario $uSUARIOBP
 */
class Trabajo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Trabajo the static model class
	 */
	 	public $imagen;
	 	public $fturno;
	 	public $tturno;
        public $date_first;
        public $date_last;
        public $flota;
        public $flota_grilla;
        public $item_1;
        public $item_2;
        public $item_3;
        public $item_4;
        public $item_5;
        public $item_6;
        public $item_7;
        public $item_8;
        public $item_9;
        public $item_10;
        public $item_11;
        public $item_12;
        public $item_13;
        public $item_14;
        public $item_15;
        public $item_16;
        public $item_17;
        public $item_18;
        public $item_19;
        public $item_20;
        public $item_21;
        public $item_22;
        public $item_23;
        public $item_24;
        public $item_25;
        public $item_26;
        public $item_27;
        public $item_28;
        public $item_29;
        public $item_30;
        public $item_31;
        public $item_32;
        public $item_33;
        public $item_34;
        public $item_35;
        public $item_36;
        public $item_37;
        public $item_38;
        public $item_39;
        public $item_40;
        public $item_41;
        public $item_42;
        public $item_43;
        public $item_44;
        public $item_45;
        public $item_46;
        public $item_47;
        public $item_48;
        public $item_49;
        public $item_50;
        public $item_51;
        public $item_52;
        public $item_53;
        public $item_54;
        public $item_55;
        public $item_56;
        public $item_57;
        public $item_58;
        public $item_59;
        public $item_60;
        public $item_61;
        public $item_62;
        public $item_63;
        public $item_64;
        public $item_65;
        public $item_66;
        public $item_67;
        public $item_68;


        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trabajo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                     array('ESTADO_ID_ESTADO', 'required','on'=>'inicio'),
                     array('AVION_MATRICULA,PLAN_INICIO,PLAN_TERMINO,FECHA,LUGAR_ID_LUGAR,ASEO_ID_ASEO', 'required','on'=>'excel'),
                     array('AVION_MATRICULA, USUARIO_BP, ESTADO_ID_ESTADO,FECHA,
                     		ASEO_ID_ASEO,LUGAR_ID_LUGAR,PLANIFICADO,OT', 'required','on'=>'ok'),
                     array('AVION_MATRICULA, USUARIO_BP, ESTADO_ID_ESTADO,FECHA,
                     		ASEO_ID_ASEO,PLANIFICADO', 'required','on'=>'laneco'),
                     array('USUARIO_BP, ESTADO_ID_ESTADO,OT', 'required','on'=>'nula'),
                     array('AVION_MATRICULA, USUARIO_BP, ESTADO_ID_ESTADO,FECHA,
                     		ASEO_ID_ASEO,PLANIFICADO,LUGAR_ID_LUGAR', 'required','on'=>'bano'),
                     array('AVION_MATRICULA,USUARIO_BP,ESTADO_ID_ESTADO,ASEO_ID_ASEO','required','on'=>'pendiente'),
                     array('OT, USUARIO_BP, PLANIFICADO, CALIFICACION, ESTADO_ID_ESTADO,
                     		LUGAR_ID_LUGAR, ASEO_ID_ASEO, TURNO_ID_TURNO', 'numerical', 'integerOnly'=>true),
                     array('FECHA','date', 'format'=>'yyyy-MM-dd'),
                     array('HORA_INICIO', 'date', 'format'=>'HH:mm'),
                     array('HORA_TERMINO','date', 'format'=>'HH:mm'),
                     array('PLAN_INICIO', 'date', 'format'=>'HH:mm'),
                     array('PLAN_TERMINO','date', 'format'=>'HH:mm'),
                     array('imagen', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true,'on'=>'update,create,ok,laneco,bano,pendiente'),
                     array('AVION_MATRICULA', 'length', 'max'=>12),
                     array('COMENTARIO', 'length', 'max'=>255),
                     array('HORA_INICIO, HORA_TERMINO, FECHA', 'safe'),
					// The following rule is used by search().
					// Please remove those attributes that should not be searched.
					array('ID_TRABAJO, OT, AVION_MATRICULA, USUARIO_BP, PLANIFICADO, HORA_INICIO,
						   HORA_TERMINO, PLAN_INICIO,PLAN_TERMINO, COMENTARIO, FECHA, ULTIMO_ASEO, CALIFICACION,
						   ESTADO_ID_ESTADO, LUGAR_ID_LUGAR, ASEO_ID_ASEO, TURNO_ID_TURNO,
						   date_first,date_last,flota,flota_grilla,fturno,tturno', 'safe', 'on'=>'search,searchItem'),
		);
	}

        function behaviors() {
            return array(
                'ensureNull' => array(
                    'class' => 'ext.ensureNullBehavior.EEnsureNullBehavior',
                    // Uncomment if you don't want to ensure nulls on update
                    // 'useOnUpdate' => false,
                )
            );
        }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'NOTA' => array(self::HAS_MANY, 'Nota', 'TRABAJO_ID_TRABAJO'),
			'aSEOIDASEO' => array(self::BELONGS_TO, 'Aseo', 'ASEO_ID_ASEO'),
			'AVION' => array(self::BELONGS_TO, 'Avion', 'AVION_MATRICULA'),
            'amat' => array(self::HAS_ONE,'Avion','MATRICULA'),
			'eSTADOIDESTADO' => array(self::BELONGS_TO, 'Estado', 'ESTADO_ID_ESTADO'),
			'lUGARIDLUGAR' => array(self::BELONGS_TO, 'Lugar', 'LUGAR_ID_LUGAR'),
			'tURNOIDTURNO' => array(self::BELONGS_TO, 'Turno', 'TURNO_ID_TURNO'),
			'uSUARIOBP' => array(self::BELONGS_TO, 'Usuario', 'USUARIO_BP'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_TRABAJO' => 'ID',
			'OT' => 'OT',
			'AVION_MATRICULA' => 'Mat',
			'USUARIO_BP' => 'BP',
			'PLANIFICADO' => 'Plan',
			'HORA_INICIO' => 'Inicio',
			'HORA_TERMINO' => 'Término',
			'PLAN_INICIO' => 'Plan Inicio',
			'PLAN_TERMINO' => 'Plan Término',
			'COMENTARIO' => 'Comentario',
			'FECHA' => 'Fecha',
			'CALIFICACION' => 'Nota',
            'ULTIMO_ASEO' => 'Días S/A',
			'ESTADO_ID_ESTADO' => 'Estado',
			'LUGAR_ID_LUGAR' => 'Lugar',
			'ASEO_ID_ASEO' => 'Aseo',
			'TURNO_ID_TURNO' => 'Turno',
            'ARCHIVO1'=> 'Foto',
            'ARCHIVO2'=> 'Archivo2',
            'ARCHIVO3'=> 'Archivo3',
            'imagen'=>'Fotos (3 máx)',
            'flota'=>'Flota',
            'flota_grilla'=>'Flota',
            'fturno'=>'Fecha Turno',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{

		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
        $criteria = new CDbCriteria;
        $flota_table= Flota::model()->tableName();
        //mark

        $flota_sql= '(select NOMBRE_FLOTA from '.$flota_table.' where '.$flota_table.'.ID_FLOTA
        			 = (select FLOTA_ID_FLOTA from avion AVION where AVION.MATRICULA = t.AVION_MATRICULA) order by NOMBRE_FLOTA asc limit 1)';

        $criteria->select = array(
            '*',
            $flota_sql . " as flota_grilla",
        );


        $criteria->with =array('AVION','tURNOIDTURNO');

        if((isset($this->date_first) && trim($this->date_first) != "") && (isset($this->date_last) && trim($this->date_last) != "")) {
          $criteria->addBetweenCondition('t.FECHA', ''.$this->date_first.'', ''.$this->date_last.'');
        }

        if($this->flota!=""){

            $flotasReg = implode('|',$this->flota); //Convert to REGEXP

		$criteria->addCondition('AVION_MATRICULA IN (select matricula from avion where FLOTA_ID_FLOTA = ANY (select id_flota from flota where nombre_FLOTA REGEXP "'.$flotasReg.'"))');


	    }


	    if($this->fturno!="") {

	    	$criteria->mergeWith(array(
	    		'condition'=>'tURNOIDTURNO.FECHA = :fturno',
	    		'params'=>array(':fturno'=>$this->fturno)));
      }

	    if($this->tturno!="") {
	    	$criteria->mergeWith(array(
	    		'condition'=>'tURNOIDTURNO.TIPO_TURNO_ID_TIPO_TURNO = :tturno',
	    		'params'=>array(':tturno'=>$this->tturno)));
      }

        $criteria->compare($flota_sql, $this->flota_grilla);
        $criteria->compare('ID_TRABAJO',$this->ID_TRABAJO);
        $criteria->compare('OT',$this->OT);
				$criteria->compare('AVION_MATRICULA',$this->AVION_MATRICULA,true);
				$criteria->compare('USUARIO_BP',$this->USUARIO_BP);
				$criteria->compare('PLANIFICADO',$this->PLANIFICADO);
				$criteria->compare('HORA_INICIO',$this->HORA_INICIO,true);
				$criteria->compare('HORA_TERMINO',$this->HORA_TERMINO,true);
				$criteria->compare('PLAN_INICIO',$this->PLAN_INICIO,true);
				$criteria->compare('PLAN_TERMINO',$this->PLAN_TERMINO,true);
		    $criteria->compare('ULTIMO_ASEO',$this->ULTIMO_ASEO,true);
				$criteria->compare('t.FECHA',$this->FECHA,true);
				$criteria->compare('CALIFICACION',$this->CALIFICACION);
				$criteria->compare('ESTADO_ID_ESTADO',$this->ESTADO_ID_ESTADO);
				$criteria->compare('LUGAR_ID_LUGAR',$this->LUGAR_ID_LUGAR);
				$criteria->compare('ASEO_ID_ASEO',$this->ASEO_ID_ASEO);
				$criteria->compare('TURNO_ID_TURNO',$this->TURNO_ID_TURNO);

        $data = new CActiveDataProvider($this, array(
				'criteria' => $criteria,
				//'pagination'=>false,
              'sort' => array(
                'defaultOrder' => 't.ID_TRABAJO',
                'attributes' => array(
                    // order by
                    'flota_grilla' => array(
                      'asc' => 'flota_grilla ASC',
                      'desc' => 'flota_grilla DESC',
                    ),
                   '*',
                ),
              ),
          ));

        //dataFor Excel
        $dataExcel= new CActiveDataProvider($this, array(
        'criteria'=> $criteria,
        'pagination'=> false,
              'sort' => array(
                'defaultOrder' => 't.ID_TRABAJO',
                'attributes'   => array(
                    // order by
                    'flota_grilla' => array(
                      'asc'  =>  'flota_grilla ASC',
                      'desc' =>  'flota_grilla DESC',
                    ),
                   '*',
                ),
              ),
          ));

        $dataToSend = (isset($dataExcel->data)) ? $dataExcel : $data;
        $_SESSION['Lectivo-excel'] = $dataToSend;
        return $data;
	}


	public function searchItem(){
		$criteria=new CDbCriteria;
		$criteria->with =array('AVION','NOTA','tURNOIDTURNO');

		$flota_sql= '(select NOMBRE_FLOTA from flota FLOTA where FLOTA.ID_FLOTA
        			 = (select FLOTA_ID_FLOTA from avion AVION where AVION.MATRICULA = t.AVION_MATRICULA) order by NOMBRE_FLOTA asc limit 1)';

        $dbCommand = Yii::app()->db->createCommand('select ID_ITEM,NOMBRE from item');
        $items_sql = $dbCommand->queryAll();


        $sql= array();

        foreach($items_sql as $item)
        	$sql[]='(select NOTA from nota NOTA where TRABAJO_ID_TRABAJO= t.ID_TRABAJO
        			 AND ITEM_ID_ITEM ='.$item['ID_ITEM'].' order by NOTA) as item_'.$item['ID_ITEM'].'';

       $arregloTemp= array('*', $flota_sql." as flota");
       $arreglo= array_merge($arregloTemp, $sql);
       $criteria->select = $arreglo;

       $criteria->addCondition('ID_TRABAJO IN (SELECT TRABAJO_ID_TRABAJO FROM nota NOTA)');
       $criteria->compare('ASEO_ID_ASEO',$this->ASEO_ID_ASEO);
       $criteria->compare('AVION_MATRICULA',$this->AVION_MATRICULA);
       $criteria->compare('FECHA',$this->FECHA,true);
       $criteria->compare('CALIFICACION',$this->CALIFICACION);

	if((isset($this->date_first) && trim($this->date_first) != "") && (isset($this->date_last) && trim($this->date_last) != ""))
            $criteria->addBetweenCondition('FECHA', ''.$this->date_first.'', ''.$this->date_last.'');


        if($this->flota!=""){

            $flotasReg = implode('|',$this->flota); //Convert to REGEXP
/*            $criteria->mergeWith(array(
		            'condition'=>'AVION.FLOTA_ID_FLOTA REGEXP :flota',
		            'params'=>array(':flota'=>$flotasReg),
	    ));
*/		$criteria->addCondition('AVION_MATRICULA IN (select matricula from avion where FLOTA_ID_FLOTA = ANY (select id_flota from flota where nombre_FLOTA REGEXP "'.$flotasReg.'"))');


	    }

       $dataProvider = new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                                    'defaultOrder' => 't.ID_TRABAJO',
                                    'attributes' => array(

                                        // order by
                                        'flota' => array(
                                            'asc' => 'flota ASC',
                                            'desc' => 'flota DESC',
                                        ),
                                       '*',
                                    ),
                        ),
                ));
      $arregloTemp2 = array(
                array(
                    'name'=>'FECHA',
                    'value'=>function($data){
                             if($data->FECHA==NULL)
                                 return "";
                             else{
	                         $temp_var= explode('-',$data->FECHA);
                                 return $temp_var[2].'-'.$temp_var[1].'-'.$temp_var[0];
                             }

                    }),
      		'flota',
      		'AVION_MATRICULA',
                array(
                    'name'=>'ASEO_ID_ASEO',
                    'value'=> function($data){
                            if($data->ASEO_ID_ASEO==NULL)
                                return "";
                            else
                                return $data->aSEOIDASEO->TIPO_ASEO;
                         },

                    'filter'=> Aseo::model()->options,
                ),
                'CALIFICACION',
            );
      $arregloTemp3 = array();

      $columns = array_merge($arregloTemp2,$arregloTemp3);
      $_SESSION['Lectivo-excel']= new CActiveDataProvider($this, array(
                							'criteria'=>$criteria,
                							'pagination'=>false,
                							));
      return array($dataProvider,$columns);
}




}