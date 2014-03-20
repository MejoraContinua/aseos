<?php

/**
 * This is the model class for table "flota".
 *
 * The followings are the available columns in table 'flota':
 * @property integer $ID_FLOTA
 * @property string $NOMBRE_FLOTA
 *
 * The followings are the available model relations:
 * @property Avion[] $avions
 * @property ItemSeEvalua[] $itemSeEvaluas
 * @property Ponderacion[] $ponderacions
 */
class Flota extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Flota the static model class
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
		return 'flota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_FLOTA', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_FLOTA, NOMBRE_FLOTA', 'safe', 'on'=>'search'),
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
			'avions' => array(self::HAS_MANY, 'Avion', 'FLOTA_ID_FLOTA'),
			'itemSeEvaluas' => array(self::HAS_MANY, 'ItemSeEvalua', 'FLOTA_ID_FLOTA'),
			'ponderacions' => array(self::HAS_MANY, 'Ponderacion', 'FLOTA_ID_FLOTA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_FLOTA' => 'Id Flota',
			'NOMBRE_FLOTA' => 'Nombre Flota',
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

		$criteria->compare('ID_FLOTA',$this->ID_FLOTA);
		$criteria->compare('NOMBRE_FLOTA',$this->NOMBRE_FLOTA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getOptions()
	{
		return CHtml::listData($this->findAll(),'ID_FLOTA','NOMBRE_FLOTA');
	}
}