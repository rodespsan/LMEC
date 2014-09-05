<?php

/**
 * This is the model class for table "{{out_order}}".
 *
 * The followings are the available columns in table '{{out_order}}':
 * @property string $id
 * @property string $order_id
 * @property string $contact_id
 * @property string $user_id
 * @property string $date_hour
 * @property string $date_hour_print
 * @property string $total_price
 * @property string $name_receive_equipment
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Order $order
 * @property User $user
 * @property Contact $contact
 */
class OutOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OutOrder the static model class
	 */
	public $_client;
	public $_equipment;
	public $_brand;
	public $_model;
	public $_serial;
	public $_advance_payment;
	public $_price_service;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{out_order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array( 
			array('order_id, contact_id, user_id, date_hour, total_price', 'required'),
			array('order_id, contact_id, user_id', 'length', 'max'=>10),
			array('total_price', 'length', 'max'=>10),
			array('total_price', 'validatePrice'),
			array('name_receive_equipment', 'length', 'max'=>100),
			array('active', 'numerical', 'integerOnly' => true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, _client, contact_id, _equipment, _brand, _model, _serial, user_id, date_hour, total_price, name_receive_equipment, active', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'contact' => array(self::BELONGS_TO, 'Contact', 'contact_id'),
			'observationOrder' => array(self::BELONGS_TO, 'ObservationOrder', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Número de Folio',
			'contact_id' => 'Nombre de contacto',
			'user_id' => 'Usuario que entrega el equipo',
			'date_hour' => 'Fecha y hora de salida',
			'date_hour_print' => 'Fecha y hora de impresión',
			'total_price' => 'Precio total',
			'name_receive_equipment' => 'Nombre de quien recibe el equipo',
			'active' => 'Activo',
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
		$criteria->with = array('order.customer', 'contact', 'user', 'order.model.EquipmentType', 'order.model.Brand');
		$criteria->compare('customer.name',$this->_client,true);

		$criteria->compare('id',$this->id,true);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('date_hour',$this->date_hour,true);
		$criteria->compare('date_hour_print',$this->date_hour_print,true);
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('name_receive_equipment',$this->name_receive_equipment,true);
		$criteria->compare('contact.name',$this->contact_id,true);
		$criteria->compare('user.name',$this->user_id,true);
		$criteria->compare('EquipmentType.type',$this->_equipment,true);
		$criteria->compare('Brand.name',$this->_brand,true);
		$criteria->compare('model.name',$this->_model,true);
		$criteria->compare('order.serial_number',$this->_serial,true);
		$criteria->compare('active', $this->active, true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
            ),
		));
	}
	
	public function getActiveText() {
        return ($this->active) ? 'Si' : 'No';
    }
	
	// Devuelve la lista de usuarios activados que tiene el sistema, el valor por defecto es el usuario logueado.
	public function getUserLogued() {
		$userLogued = User::model()->findByPk(Yii::app()->user->id);
        $listUser = array($userLogued->id => $userLogued->name) + CHtml::listData(User::model()->findAll('active = 1'), 'id','name');
		return $listUser;
    }
	
	public function validatePrice()
	{
		if(is_numeric($this->total_price))
		{
			$digits = explode(".", $this->total_price);
			foreach($digits as $digit)
			{
				$lengthPrice = strlen($digit);
				if($lengthPrice>7)
					$this->addError('total_price','El precio no es valido');
			}
		}
		else
			$this->addError('total_price','El precio debe contener solo números');
		
	}
	
	public function getDebit()
	{
		$result = $this->total_price - $this->order->advance_payment;
		if($result > 0)
			return $result;
		else
			return 0;
	}
	
	public function getObservation()
	{
		$observationOrder = ObservationOrder::model()->find('order_id='.$this->order_id);
		return $observationOrder->observation;
	}
	
	public function viewOutOrder($order)
	{
		$view = $this->find('order_id='.$order.'');
		if($view!= null)
			return $view->id;
	}
	
	public function getLastService()
	{
		$services = $this->order->ServiceOrders;
               
               
		$result = end($services);
              
                
                var_dump($services);
                die();
		
		if($this->total_price == null){
			$this->_price_service = $result->price;
			$this->calculatePrice();
		}
		
		return $result; 
	}
	
	public function calculatePrice(){
		$sparePrice = $this->getSparePrice();
		
		$this->total_price = $sparePrice + $this->_price_service;
	}
	
	public function getSparePrice(){
	$price = 0;
		foreach ($this->order->spareParts as $spare) {
			$price = $price + $spare->price;
		}
	return $price;
	}
	
}