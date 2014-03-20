<?php

/**
 * This is the model class for table "nota".
 *
 * The followings are the available columns in table 'nota':
 * @property integer $ID_NOTA
 * @property integer $NOTA
 * @property integer $ITEM_ID_ITEM
 * @property integer $TRABAJO_ID_TRABAJO
 *
 * The followings are the available model relations:
 * @property Item $iTEMIDITEM
 * @property Trabajo $tRABAJOIDTRABAJO
 */
class Nota extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nota the static model class
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
		return 'nota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ITEM_ID_ITEM, TRABAJO_ID_TRABAJO,NOTA', 'required'),
			array('ITEM_ID_ITEM, TRABAJO_ID_TRABAJO,NOTA', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_NOTA, NOTA, ITEM_ID_ITEM, TRABAJO_ID_TRABAJO', 'safe', 'on'=>'search'),
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
			'iTEMIDITEM' => array(self::BELONGS_TO, 'Item', 'ITEM_ID_ITEM'),
			'tRABAJOIDTRABAJO' => array(self::BELONGS_TO, 'Trabajo', 'TRABAJO_ID_TRABAJO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_NOTA' => 'Id Nota',
			'NOTA' => 'Nota',
			'ITEM_ID_ITEM' => 'Item Id Item',
			'TRABAJO_ID_TRABAJO' => 'Trabajo Id Trabajo',
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

		$criteria->compare('ID_NOTA',$this->ID_NOTA);
		$criteria->compare('NOTA',$this->NOTA);
		$criteria->compare('ITEM_ID_ITEM',$this->ITEM_ID_ITEM);
		$criteria->compare('TRABAJO_ID_TRABAJO',$this->TRABAJO_ID_TRABAJO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}