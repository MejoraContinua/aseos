<?php

/**
 * This is the model class for table "aseo".
 *
 * The followings are the available columns in table 'aseo':
 * @property integer $ID_ASEO
 * @property string $TIPO_ASEO
 *
 * The followings are the available model relations:
 * @property ItemSeEvalua[] $itemSeEvaluas
 * @property Ponderacion[] $ponderacions
 * @property Trabajo[] $trabajos
 */
class Aseo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Aseo the static model class
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
		return 'aseo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TIPO_ASEO', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_ASEO, TIPO_ASEO', 'safe', 'on'=>'search'),
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
			'itemSeEvaluas' => array(self::HAS_MANY, 'ItemSeEvalua', 'ASEO_ID_ASEO'),
			'ponderacions' => array(self::HAS_MANY, 'Ponderacion', 'ASEO_ID_ASEO'),
			'trabajos' => array(self::HAS_MANY, 'Trabajo', 'ASEO_ID_ASEO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_ASEO' => 'Id Aseo',
			'TIPO_ASEO' => 'Tipo Aseo',
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

		$criteria->compare('ID_ASEO',$this->ID_ASEO);
		$criteria->compare('TIPO_ASEO',$this->TIPO_ASEO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        /**
	 * @return array for dropdown (attr1 => attr2)
	 */
	public function getOptions()
	{
		return CHtml::listData($this->findAll(),'ID_ASEO','TIPO_ASEO');
	}
        
        public function getSize(){
            return count($this->findAll());
        }

}   