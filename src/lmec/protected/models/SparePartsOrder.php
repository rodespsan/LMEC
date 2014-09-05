<?php 

/**
 * This is the model class for table "{{spare_parts_order}}".
 *
 * The followings are the available columns in table '{{spare_parts_order}}':
 * @property integer $id
 * @property string $order_id
 * @property string $spare_parts_id
 *
 * The followings are the available model relations:
 * @property Order $order
 * @property SpareParts $spareParts
 */
class SparePartsOrder extends CActiveRecord
{
	public $spare_parts_type_id;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{spare_parts_order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('spare_parts_id', 'required'),
//			array('spare_parts_id', 'numerical', 'integerOnly'=>true),
			array('order_id', 'length', 'max'=>10),
			array('spare_parts_id', 'CExistInArrayValidator', 'className'=>'SpareParts', 'attributeName'=>'id'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, spare_parts_type_id, spare_parts_id', 'safe', 'on'=>'search'),
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
			'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
			'spareParts' => array(self::BELONGS_TO, 'SpareParts', 'spare_parts_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Orden',
			'spare_parts_id' => 'Refacción',
			'spare_parts_type_id' => 'Tipo de Refacción',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('spare_parts_type_id',$this->spare_parts_type_id);
		$criteria->compare('spare_parts_id',$this->spare_parts_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SparePartsOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getTypes()
	{
		return $ModelTypes = SparePartsType::model()->findAll('active = 1');
    }
    public function getSpareParts()
	{
		return $ModelSpareParts = SpareParts::model()->findAll('active = 1');
    }
}
