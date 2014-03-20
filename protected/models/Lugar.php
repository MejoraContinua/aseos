<?php

/**
 * This is the model class for table "lugar".
 *
 * The followings are the available columns in table 'lugar':
 * @property integer $ID_LUGAR
 * @property string $LUGAR
 * @property integer $FILIAL_ID_FILIAL
 *
 * The followings are the available model relations:
 * @property Filial $fILIALIDFILIAL
 * @property Trabajo[] $trabajos
 */
class Lugar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lugar the static model class
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
		return 'lugar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FILIAL_ID_FILIAL', 'required'),
			array('FILIAL_ID_FILIAL', 'numerical', 'integerOnly'=>true),
			array('LUGAR', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_LUGAR, LUGAR, FILIAL_ID_FILIAL', 'safe', 'on'=>'search'),
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
			'fILIALIDFILIAL' => array(self::BELONGS_TO, 'Filial', 'FILIAL_ID_FILIAL'),
			'trabajos' => array(self::HAS_MANY, 'Trabajo', 'LUGAR_ID_LUGAR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_LUGAR' => 'ID Lugar',
			'LUGAR' => 'Lugar',
			'FILIAL_ID_FILIAL' => 'Filial',
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

		$criteria->compare('ID_LUGAR',$this->ID_LUGAR);
		$criteria->compare('LUGAR',$this->LUGAR,true);
		$criteria->compare('FILIAL_ID_FILIAL',$this->FILIAL_ID_FILIAL);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        /**
	 * @return array for dropdown (attr1 => attr2)
	 */
	public function getOptions()
	{
		return CHtml::listData($this->findAll(),'ID_LUGAR','LUGAR');
	}
}