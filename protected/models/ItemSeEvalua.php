<?php

/**
 * This is the model class for table "item_se_evalua".
 *
 * The followings are the available columns in table 'item_se_evalua':
 * @property integer $ID_ISE
 * @property integer $FLOTA_ID_FLOTA
 * @property integer $ASEO_ID_ASEO
 * @property integer $ITEM_ID_ITEM
 *
 * The followings are the available model relations:
 * @property Aseo $aSEOIDASEO
 * @property Flota $fLOTAIDFLOTA
 * @property Item $iTEMIDITEM
 */
class ItemSeEvalua extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItemSeEvalua the static model class
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
		return 'item_se_evalua';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FLOTA_ID_FLOTA, ASEO_ID_ASEO, ITEM_ID_ITEM', 'required'),
			array('FLOTA_ID_FLOTA, ASEO_ID_ASEO, ITEM_ID_ITEM', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_ISE, FLOTA_ID_FLOTA, ASEO_ID_ASEO, ITEM_ID_ITEM', 'safe', 'on'=>'search'),
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
			'fLOTAIDFLOTA' => array(self::BELONGS_TO, 'Flota', 'FLOTA_ID_FLOTA'),
			'iTEMIDITEM' => array(self::BELONGS_TO, 'Item', 'ITEM_ID_ITEM'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_ISE' => 'ID Item a evaluar',
			'FLOTA_ID_FLOTA' => 'Flota',
			'ASEO_ID_ASEO' => 'Aseo',
			'ITEM_ID_ITEM' => 'Item',
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

		$criteria->compare('ID_ISE',$this->ID_ISE);
		$criteria->compare('FLOTA_ID_FLOTA',$this->FLOTA_ID_FLOTA);
		$criteria->compare('ASEO_ID_ASEO',$this->ASEO_ID_ASEO);
		$criteria->compare('ITEM_ID_ITEM',$this->ITEM_ID_ITEM);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}