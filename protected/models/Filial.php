<?php

/**
 * This is the model class for table "filial".
 *
 * The followings are the available columns in table 'filial':
 * @property integer $ID_FILIAL
 * @property string $NOMBRE_FILIAL
 * @property string $PAIS
 *
 * The followings are the available model relations:
 * @property Lugar[] $lugars
 * @property Usuario[] $usuarios
 */
class Filial extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Filial the static model class
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
		return 'filial';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_FILIAL', 'length', 'max'=>20),
			array('PAIS', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_FILIAL, NOMBRE_FILIAL, PAIS', 'safe', 'on'=>'search'),
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
			'lugars' => array(self::HAS_MANY, 'Lugar', 'FILIAL_ID_FILIAL'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'FILIAL_ID_FILIAL'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_FILIAL' => 'ID Filial',
			'NOMBRE_FILIAL' => 'Nombre filial',
			'PAIS' => 'Pais',
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

		$criteria->compare('ID_FILIAL',$this->ID_FILIAL);
		$criteria->compare('NOMBRE_FILIAL',$this->NOMBRE_FILIAL,true);
		$criteria->compare('PAIS',$this->PAIS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getOptions()
	{
		return CHtml::listData($this->findAll(),'ID_FILIAL','NOMBRE_FILIAL');
	}
}