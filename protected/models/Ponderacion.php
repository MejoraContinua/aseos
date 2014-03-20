<?php

/**
 * This is the model class for table "ponderacion".
 *
 * The followings are the available columns in table 'ponderacion':
 * @property integer $ID_PONDERACION
 * @property integer $PONDERACION
 * @property integer $ASEO_ID_ASEO
 * @property integer $FLOTA_ID_FLOTA
 * @property integer $EVALUACION_ID_EVALUACION
 *
 * The followings are the available model relations:
 * @property Aseo $aSEOIDASEO
 * @property Evaluacion $eVALUACIONIDEVALUACION
 * @property Flota $fLOTAIDFLOTA
 */
class Ponderacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ponderacion the static model class
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
		return 'ponderacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PONDERACION, ASEO_ID_ASEO, FLOTA_ID_FLOTA, EVALUACION_ID_EVALUACION', 'required'),
			array('PONDERACION, ASEO_ID_ASEO, FLOTA_ID_FLOTA, EVALUACION_ID_EVALUACION', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_PONDERACION, PONDERACION, ASEO_ID_ASEO, FLOTA_ID_FLOTA, EVALUACION_ID_EVALUACION', 'safe', 'on'=>'search'),
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
			'aSEOIDASEO' => array(self::BELONGS_TO, 'Aseo', 'ASEO_ID_ASEO'),
			'eVALUACIONIDEVALUACION' => array(self::BELONGS_TO, 'Evaluacion', 'EVALUACION_ID_EVALUACION'),
			'fLOTAIDFLOTA' => array(self::BELONGS_TO, 'Flota', 'FLOTA_ID_FLOTA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_PONDERACION' => 'ID Ponderacion',
			'PONDERACION' => 'Ponderacion',
			'ASEO_ID_ASEO' => 'Aseo',
			'FLOTA_ID_FLOTA' => 'Flota',
			'EVALUACION_ID_EVALUACION' => 'Evaluacion',
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

		$criteria->compare('ID_PONDERACION',$this->ID_PONDERACION);
		$criteria->compare('PONDERACION',$this->PONDERACION);
		$criteria->compare('ASEO_ID_ASEO',$this->ASEO_ID_ASEO);
		$criteria->compare('FLOTA_ID_FLOTA',$this->FLOTA_ID_FLOTA);
		$criteria->compare('EVALUACION_ID_EVALUACION',$this->EVALUACION_ID_EVALUACION);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}