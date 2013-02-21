<?php

/**
 * This is the model class for table "{{customer}}".
 *
 * The followings are the available columns in table '{{customer}}':
 * @property string $id
 * @property string $customer_type_id
 * @property string $address
 * @property string $dependence_id
 * @property integer $active
 */
class Customer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
        public $contact = null;
        public $nombreContacto = "";
        
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{customer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_type_id, dependence_id, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('customer_type_id, dependence_id', 'length', 'max'=>10),
			array('address', 'length', 'max'=>200),
                    
                        array('nombreContacto', 'length', 'max'=>200),/////
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, customer_type_id, address, dependence_id, active', 'safe', 'on'=>'search'),
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
                    'contacts'=>array(self::MANY_MANY,'Contact','tbl_customer_contact(customer_id,contact_id)'),
                    
                    //'contact' => array(self::BELONGS_TO, 'Contact', 'contact_id'),
                    'customerType' => array(self::BELONGS_TO, 'CustomerType', 'customer_type_id'),
                    'dependence' => array(self::BELONGS_TO, 'Dependence', 'dependence_id'),
                    'orders' => array(self::HAS_MANY, 'Order', 'customer_id')
		);                
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
            return array(
			'id' => 'ID',
			'customer_type_id' => 'Tipo de cliente',
			'contact_id' => 'Contacto',
			'address' => 'Dirección',
			'dependence_id' => 'Dependencia',
                        'nombreContacto'=>'Nombre de contacto',
			'active' => 'Activo',
		);
            /*
		return array(
			'id' => 'ID',
			'customer_type_id' => 'Customer Type',
			'address' => 'Address',
			'dependence_id' => 'Dependence',
			'active' => 'Active',
		);*/
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.                
                //Yii::app()->end();
		$criteria=new CDbCriteria;
                
                $criteria->select = "t.id, t.customer_type_id, t.address, t.dependence_id, t.active";    
		//$criteria->compare('id',$this->id,true);
		//$criteria->compare('customer_type_id',$this->customer_type_id,true);
                $criteria->compare('C.type',$this->customer_type_id,true);
		$criteria->compare('t.address',$this->address,true);
		$criteria->compare('D.name',$this->dependence_id,true);
                //$criteria->compare('CO.name',$this->id,true); Asi si busca bien.
                $criteria->compare('CO.name',$this->nombreContacto,true);
		$criteria->compare('t.active',$this->active);
                $criteria->join = 'INNER JOIN tbl_customer_type AS C ON C.id = t.customer_type_id INNER JOIN tbl_dependence AS D ON D.id = t.dependence_id INNER JOIN tbl_customer_contact AS CC ON CC.customer_id=t.id INNER JOIN tbl_contact AS CO ON CO.id = CC.contact_id';
                $criteria->group = 'id, customer_type_id, address, dependence_id';
                //$criteria->select = "*";
                //$criteria->condition = "t.id = "+$this->id+" AND t.address LIKE %"+$this->address+"% AND t.active = "+$this->active;
                //$criteria->join = 'INNER JOIN tbl_dependence AS D ON D.id = t.dependence_id INNER JOIN tbl_customer_contact AS CC ON CC.customer_id=t.id INNER JOIN tbl_contact AS CO ON CO.id = CC.contact_id AND CC.contact_id = CO.id';
                

		/*$b = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));                 
                 */
                
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
        //var_dump($b->getData());
          //      Yii::app()->end();
          
	}
}