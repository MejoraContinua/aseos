<?php

/**
 * This is the model class for table "avion".
 *
 * The followings are the available columns in table 'avion':
 * @property string $MATRICULA
 * @property integer $FLOTA_ID_FLOTA
 * @property integer $OPERADOR_ID_OPERADOR
 *
 * The followings are the available model relations:
 * @property Operador $oPERADORIDOPERADOR
 * @property Flota $fLOTAIDFLOTA
 * @property Trabajo $aLFOMBRARELA
 * @property Trabajo[] $trabajos
 */
class Avion extends CActiveRecord
{
        public $alfombra_count;
        public $fuselaje_count;
        public $profundo_count;
        public $tapiz_count;
        public $banos_count;
        public $mat_multi;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Avion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'avion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MATRICULA, FLOTA_ID_FLOTA, OPERADOR_ID_OPERADOR', 'required'),
			array('FLOTA_ID_FLOTA, OPERADOR_ID_OPERADOR', 'numerical', 'integerOnly'=>true),
			array('MATRICULA', 'length', 'max' => 10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('MATRICULA, FLOTA_ID_FLOTA, OPERADOR_ID_OPERADOR,mat_multi,alfombra_count,fuselaje_count,profundo_count,tapiz_count,banos_count', 'safe', 'on'=>'search'),
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
			'oPERADORIDOPERADOR' => array(self::BELONGS_TO, 'Operador', 'OPERADOR_ID_OPERADOR'),
			'fLOTAIDFLOTA' => array(self::BELONGS_TO, 'Flota', 'FLOTA_ID_FLOTA'),
			'tRABAJO' => array(self::HAS_MANY, 'Trabajo', 'AVION_MATRICULA'),
                );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'MATRICULA' => 'Matricula',
			'FLOTA_ID_FLOTA' => 'Flota',
			'OPERADOR_ID_OPERADOR' => 'Operador',
			'mat_multi'=>'Matrículas',
                        'alfombra_count'=>'Alfombra',
                    'fuselaje_count'=>'Fuselaje',
                    'profundo_count'=>'Profundo',
                    'banos_count'=>'Baños',
                    'tapiz_count'=>'Tapiz',
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

		$criteria=new CDbCriteria;

		$criteria->compare('MATRICULA',$this->MATRICULA,true);
		$criteria->compare('FLOTA_ID_FLOTA',$this->FLOTA_ID_FLOTA);
		$criteria->compare('OPERADOR_ID_OPERADOR',$this->OPERADOR_ID_OPERADOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                    'pagination'=>array('pageSize'=>132),
		));
	}

		public function searchResumen()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('MATRICULA',$this->MATRICULA,true);
		$criteria->compare('FLOTA_ID_FLOTA',$this->FLOTA_ID_FLOTA);
		$criteria->compare('OPERADOR_ID_OPERADOR',$this->OPERADOR_ID_OPERADOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                    'pagination'=>array('pageSize'=>132),
		));
	}

    public function searchAvion()
	{

		$criteria=new CDbCriteria;
                $alfombra_table= Trabajo::model()->tableName();
                $alfombra_sql= '(select (DATEDIFF(NOW(),FECHA)) as alf from '.$alfombra_table.' where '.$alfombra_table.'.AVION_MATRICULA = t.MATRICULA and '.$alfombra_table.'.ASEO_ID_ASEO=2 and '.$alfombra_table.'.ESTADO_ID_ESTADO=1 and FECHA in (select max(FECHA) as FECHA from trabajo TRABAJO group by AVION_MATRICULA) order by alf asc limit 1)';
                $fuselaje_sql= '(select (DATEDIFF(NOW(),FECHA)) as fus from '.$alfombra_table.' where '.$alfombra_table.'.AVION_MATRICULA = t.MATRICULA and '.$alfombra_table.'.ASEO_ID_ASEO=4 and '.$alfombra_table.'.ESTADO_ID_ESTADO=1 and FECHA in (select max(FECHA) as FECHA from trabajo TRABAJO group by AVION_MATRICULA) order by fus asc limit 1)';
                $tapiz_sql= '(select (DATEDIFF(NOW(),FECHA)) as tap from '.$alfombra_table.' where '.$alfombra_table.'.AVION_MATRICULA = t.MATRICULA and '.$alfombra_table.'.ASEO_ID_ASEO=6 and '.$alfombra_table.'.ESTADO_ID_ESTADO=1 and FECHA in (select max(FECHA) as FECHA from trabajo TRABAJO group by AVION_MATRICULA) order by tap asc limit 1)';
                $profundo_sql= '(select (DATEDIFF(NOW(),FECHA)) as prof from '.$alfombra_table.' where '.$alfombra_table.'.AVION_MATRICULA = t.MATRICULA and '.$alfombra_table.'.ASEO_ID_ASEO=5 and '.$alfombra_table.'.ESTADO_ID_ESTADO=1 and FECHA in (select max(FECHA) as FECHA from trabajo TRABAJO group by AVION_MATRICULA) order by prof asc limit 1)';
                $banos_sql= '(select (DATEDIFF(NOW(),FECHA)) as ban from '.$alfombra_table.' where '.$alfombra_table.'.AVION_MATRICULA = t.MATRICULA and '.$alfombra_table.'.ASEO_ID_ASEO=8 and '.$alfombra_table.'.ESTADO_ID_ESTADO=1 and FECHA in (select max(FECHA) as FECHA from trabajo TRABAJO group by AVION_MATRICULA) order by ban asc limit 1)';


		$criteria->select = array(
                    '*',
                    $alfombra_sql . " as alfombra_count",
                    $fuselaje_sql . " as fuselaje_count",
                    $tapiz_sql . " as tapiz_count",
                    $profundo_sql . " as profundo_count",
                    $banos_sql . " as banos_count",
                );

        if($this->mat_multi!=""){

            $matsReg = implode('|',$this->mat_multi); //Convert to REGEXP
            $criteria->addCondition('MATRICULA REGEXP "'.$matsReg.'"');

	    }

	    if($this->FLOTA_ID_FLOTA!=""){
		    $flotsReg = implode('|',$this->FLOTA_ID_FLOTA); //Convert to REGEXP
            $criteria->addCondition('FLOTA_ID_FLOTA = ANY (select id_flota from flota where nombre_FLOTA REGEXP "'.$flotsReg.'")');
	    }

                $criteria->compare($alfombra_sql, $this->alfombra_count);
                $criteria->compare($fuselaje_sql, $this->fuselaje_count);
                $criteria->compare($tapiz_sql, $this->tapiz_count);
                $criteria->compare($profundo_sql, $this->profundo_count);
                $criteria->compare($banos_sql, $this->banos_count);
                $criteria->compare('MATRICULA',$this->MATRICULA,true);
                $criteria->compare('OPERADOR_ID_OPERADOR',$this->OPERADOR_ID_OPERADOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>false,
                        'sort' => array(
                                    'defaultOrder' => 't.MATRICULA',
                                    'attributes' => array(

                                        // order by
                                        'alfombra_count' => array(
                                            'asc' => 'alfombra_count ASC',
                                            'desc' => 'alfombra_count DESC',
                                        ),
                                        'banos_count' => array(
                                            'asc' => 'banos_count ASC',
                                            'desc' => 'banos_count DESC',
                                        ),
                                        'tapiz_count' => array(
                                            'asc' => 'tapiz_count ASC',
                                            'desc' => 'tapiz_count DESC',
                                        ),
                                        'fuselaje_count' => array(
                                            'asc' => 'fuselaje_count ASC',
                                            'desc' => 'fuselaje_count DESC',
                                        ),
                                        'profundo_count' => array(
                                            'asc' => 'profundo_count ASC',
                                            'desc' => 'profundo_count DESC',
                                        ),
                                        '*',
                                    ),
                        ),
		));
	}


        public function suggestMatricula($keyword, $limit=20)
	{
		$criteria=array(
			'select'=>'DISTINCT(MATRICULA) AS MATRICULA',
			'condition'=>'MATRICULA LIKE :keyword',
			'order'=>'MATRICULA',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>"$keyword%"
			)
		);
		$models=$this->findAll($criteria);
		$suggest=array();
		foreach($models as $model) {
				$suggest[] = array(
					'value'=>$model->MATRICULA,
					'label'=>$model->MATRICULA,
				);
		}
		return $suggest;
	}

        public function getOptions()
	{
		return CHtml::listData($this->findAll(),'MATRICULA','MATRICULA');
	}

}