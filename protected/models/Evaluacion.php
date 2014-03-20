<?php

/**
 * This is the model class for table "evaluacion".
 *
 * The followings are the available columns in table 'evaluacion':
 * @property integer $ID_EVALUACION
 * @property string $NOMBRE
 *
 * The followings are the available model relations:
 * @property Item[] $items
 * @property Ponderacion[] $ponderacions
 */
class Evaluacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Evaluacion the static model class
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
		return 'evaluacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE', 'required'),
			array('ID_EVALUACION', 'numerical', 'integerOnly'=>true),
			array('NOMBRE', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_EVALUACION, NOMBRE', 'safe', 'on'=>'search'),
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
			'items' => array(self::HAS_MANY, 'Item', 'EVALUACION_ID_EVALUACION'),
			'ponderacions' => array(self::HAS_MANY, 'Ponderacion', 'EVALUACION_ID_EVALUACION'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_EVALUACION' => 'ID Evaluación',
			'NOMBRE' => 'Nombre',
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

		$criteria->compare('ID_EVALUACION',$this->ID_EVALUACION);
		$criteria->compare('NOMBRE',$this->NOMBRE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getOptions()
	{
		return CHtml::listData($this->findAll(),'ID_EVALUACION','NOMBRE');
	}
}