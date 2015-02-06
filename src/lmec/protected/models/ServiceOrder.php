<?php

/**
 * This is the model class for table "{{service_order}}".
 *
 * The followings are the available columns in table '{{service_order}}':
 * @property string $id
 * @property string $order_id
 * @property string $service_id
 * @property string $price
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Order $order
 * @property Service $service
 */
class ServiceOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ServiceOrder the static model class
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
		return '{{service_order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, service_id, price, date', 'required'),
			array('order_id, service_id', 'length', 'max'=>10),
			array('price', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, service_id, price, date', 'safe', 'on'=>'search'),
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
			'service' => array(self::BELONGS_TO, 'Service', 'service_id'),
//                        'Services'=>array(self::HAS_MANY, 'Service','id'),
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
			'service_id' => 'Servicio',
			'price' => 'Precio',
			'date' => 'Fecha',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('service_id',$this->service_id,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}