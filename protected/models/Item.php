<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $ID_ITEM
 * @property string $NOMBRE
 * @property integer $EVALUACION_ID_EVALUACION
 *
 * The followings are the available model relations:
 * @property Evaluacion $eVALUACIONIDEVALUACION
 * @property ItemSeEvalua[] $itemSeEvaluas
 * @property Nota[] $notas
 */
class Item extends CActiveRecord
{
        public $id_trabajo;
        public $notas;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Item the static model class
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
		return 'item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE ,EVALUACION_ID_EVALUACION', 'required'),
			array('ID_ITEM, EVALUACION_ID_EVALUACION', 'numerical', 'integerOnly'=>true),
			array('NOMBRE', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_ITEM, NOMBRE, EVALUACION_ID_EVALUACION,id_trabajo,notas', 'safe', 'on'=>'search'),
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
			'eVALUACIONIDEVALUACION' => array(self::BELONGS_TO, 'Evaluacion', 'EVALUACION_ID_EVALUACION'),
			'itemSeEvaluas' => array(self::HAS_MANY, 'ItemSeEvalua', 'ITEM_ID_ITEM'),
			'notas' => array(self::HAS_MANY, 'Nota', 'ITEM_ID_ITEM'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_ITEM' => 'ID Item',
			'NOMBRE' => 'Nombre',
			'EVALUACION_ID_EVALUACION' => 'Evaluacion',
                        'id_trabajo'=> 'ID Trabajo',
                        'notas'=> 'Calificación'
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

		$criteria->compare('ID_ITEM',$this->ID_ITEM);
		$criteria->compare('NOMBRE',$this->NOMBRE,true);
		$criteria->compare('EVALUACION_ID_EVALUACION',$this->EVALUACION_ID_EVALUACION);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function searchItem()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

                $nota_table= Nota::model()->tableName();
                $nota_sql= '(select NOTA from '.$nota_table.' where '.$nota_table.'.trabajo_id_trabajo= '.$this->id_trabajo.' and '.$nota_table.'.ITEM_ID_ITEM= t.ID_ITEM limit 1)';

		$criteria->select = array(
                    '*',
                    $nota_sql . " as notas",

                );
                $criteria->compare($nota_sql, $this->notas);
                $criteria->compare('ID_ITEM',$this->ID_ITEM);
		$criteria->compare('NOMBRE',$this->NOMBRE,true);
		$criteria->compare('EVALUACION_ID_EVALUACION',$this->EVALUACION_ID_EVALUACION);
                $dbCommand = Yii::app()->db->createCommand("
                    SELECT COUNT(*) as count FROM `item`
                 ");

                 $data = $dbCommand->queryAll();
                 $rows = $data[0]['count'];

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>$rows),
		));
	}
        public function getOptions()
	{
		return CHtml::listData($this->findAll(),'ID_ITEM','NOMBRE');
	}
}