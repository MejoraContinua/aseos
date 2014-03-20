<?php

/**
 * This is the model class for table "turno".
 *
 * The followings are the available columns in table 'turno':
 * @property integer $ID_TURNO
 * @property string $FECHA
 * @property integer $TIPO_TURNO_ID_TIPO_TURNO
 *
 * The followings are the available model relations:
 * @property Trabajo[] $trabajos
 * @property TipoTurno $tIPOTURNOIDTIPOTURNO
 */
class Turno extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Turno the static model class
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
		return 'turno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TIPO_TURNO_ID_TIPO_TURNO,FECHA', 'required'),
			array('TIPO_TURNO_ID_TIPO_TURNO', 'numerical', 'integerOnly'=>true),
			array('FECHA', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_TURNO, FECHA, TIPO_TURNO_ID_TIPO_TURNO', 'safe', 'on'=>'search'),
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
			'trabajos' => array(self::HAS_MANY, 'Trabajo', 'TURNO_ID_TURNO'),
			'tIPOTURNOIDTIPOTURNO' => array(self::BELONGS_TO, 'TipoTurno', 'TIPO_TURNO_ID_TIPO_TURNO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_TURNO' => 'Id Turno',
			'FECHA' => 'Fecha turno',
			'TIPO_TURNO_ID_TIPO_TURNO' => 'Tipo Turno',
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

		$criteria->compare('ID_TURNO',$this->ID_TURNO);
		$criteria->compare('FECHA',$this->FECHA,true);
		$criteria->compare('TIPO_TURNO_ID_TIPO_TURNO',$this->TIPO_TURNO_ID_TIPO_TURNO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
         public function getOptions()
	{       
                $posts= $this->findAll();
		return CHtml::listData($posts,'ID_TURNO','FECHA',function($post) {
                                                return CHtml::encode($post->tIPOTURNOIDTIPOTURNO->TIPO);
                                        });
                
	}
}