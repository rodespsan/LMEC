<?php

/**
 * This is the model class for table "{{customer}}".
 *
 * The followings are the available columns in table '{{customer}}':
 * @property string $id
 * @property string $customer_type_id
 * @property string $contact_id
 * @property string $address
 * @property string $dependence_id
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Contacto $contact
 * @property CustomerType $customerType
 * @property Dependence $dependence
 * @property Order[] $orders
 * 
 *  
 */
class Customer extends CActiveRecord
{       
        
        /*
        public $name;
        public $email;
        public $cell_phone_number;
        public $telephone_number_house;
        public $telephone_number_office;
        public $extension_office;

    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customer the static model class
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
			array('customer_type_id', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
                        
			array('customer_type_id, contact_id, dependence_id', 'length', 'max'=>10),
			array('address', 'length', 'max'=>200),
                        array('dependence_id','seleccionado'),
                    
                        
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, customer_type_id, contact_id, address, dependence_id, active', 'safe', 'on'=>'search'),
                    
                    
                        /*******************************************************/
                        
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
			'contact' => array(self::BELONGS_TO, 'Contact', 'contact_id'),
			'customerType' => array(self::BELONGS_TO, 'CustomerType', 'customer_type_id'),
			'dependence' => array(self::BELONGS_TO, 'Dependence', 'dependence_id'),
			'orders' => array(self::HAS_MANY, 'Order', 'customer_id'),
		);
	}
        
        public function seleccionado($attribute,$params){
            //Yii()->app()->end();
            if($this->dependence_id === -1 ){
                $this->addError('dependence_id','Debe seleccionar una dependencia');
            }else{
                
            }
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('customer_type_id',$this->customer_type_id,true);
		$criteria->compare('contact_id',$this->contact_id,true);
		$criteria->compare('address',$this->address,true);
                //$criteria->compare('tbl_dependence.name',$this->dependence->name,true);
		$criteria->compare('dependence_id',$this->dependence_id,true);
		$criteria->compare('active',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}