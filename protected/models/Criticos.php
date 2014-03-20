<?php

/**
 * This is the model class for table "criticos".
 *
 * The followings are the available columns in table 'criticos':
 * @property integer $ID_CRITICOS
 * @property integer $FLOTA_ID_FLOTA
 * @property integer $ASEO_ID_ASEO
 * @property integer $LIMITE1
 * @property integer $LIMITE2
 * @property integer $LIMITE3
 *
 * The followings are the available model relations:
 * @property Flota $fLOTAIDFLOTA
 * @property Aseo $aSEOIDASEO
 */
class Criticos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CRITICOS the static model class
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
		return 'criticos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_CRITICOS, FLOTA_ID_FLOTA, ASEO_ID_ASEO', 'required'),
			array('ID_CRITICOS, FLOTA_ID_FLOTA, ASEO_ID_ASEO, LIMITE1, LIMITE2, LIMITE3', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_CRITICOS, FLOTA_ID_FLOTA, ASEO_ID_ASEO, LIMITE1, LIMITE2, LIMITE3', 'safe', 'on'=>'search'),
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
			'fLOTAIDFLOTA' => array(self::BELONGS_TO, 'Flota', 'FLOTA_ID_FLOTA'),
			'aSEOIDASEO' => array(self::BELONGS_TO, 'Aseo', 'ASEO_ID_ASEO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_CRITICOS' => 'ID Crítico',
			'FLOTA_ID_FLOTA' => 'Flota',
			'ASEO_ID_ASEO' => 'Aseo',
			'LIMITE1' => 'Limite1',
			'LIMITE2' => 'Limite2',
			'LIMITE3' => 'Limite3',
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

		$criteria->compare('ID_CRITICOS',$this->ID_CRITICOS);
		$criteria->compare('FLOTA_ID_FLOTA',$this->FLOTA_ID_FLOTA);
		$criteria->compare('ASEO_ID_ASEO',$this->ASEO_ID_ASEO);
		$criteria->compare('LIMITE1',$this->LIMITE1);
		$criteria->compare('LIMITE2',$this->LIMITE2);
		$criteria->compare('LIMITE3',$this->LIMITE3);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}