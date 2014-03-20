<?php

/**
 * This is the model class for table "operador".
 *
 * The followings are the available columns in table 'operador':
 * @property integer $ID_OPERADOR
 * @property string $NOMBRE_OPERADOR
 *
 * The followings are the available model relations:
 * @property Avion[] $avions
 */
class Operador extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Operador the static model class
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
		return 'operador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_OPERADOR', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_OPERADOR, NOMBRE_OPERADOR', 'safe', 'on'=>'search'),
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
			'avions' => array(self::HAS_MANY, 'Avion', 'OPERADOR_ID_OPERADOR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_OPERADOR' => 'Id Operador',
			'NOMBRE_OPERADOR' => 'Nombre Operador',
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

		$criteria->compare('ID_OPERADOR',$this->ID_OPERADOR);
		$criteria->compare('NOMBRE_OPERADOR',$this->NOMBRE_OPERADOR,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getOptions()
	{
		return CHtml::listData($this->findAll(),'ID_OPERADOR','NOMBRE_OPERADOR');
	}
}