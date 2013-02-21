<?php

/**
 * This is the model class for table "{{contact}}".
 *
 * The followings are the available columns in table '{{contact}}':
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $cell_phone_number
 * @property string $telephone_number_house
 * @property string $telephone_number_office
 * @property string $extension_office
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property CustomerContact[] $customerContacts
 */
class Contact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contact the static model class
	 */
        public $customer_id;
        
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{contact}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>100),
			array('cell_phone_number, telephone_number_house, telephone_number_office', 'length', 'max'=>35),
			array('extension_office', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, cell_phone_number, telephone_number_house, telephone_number_office, extension_office, active', 'safe', 'on'=>'search'),
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
			'customerContacts' => array(self::HAS_MANY, 'CustomerContact', 'contact_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
            /*
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'email' => 'Email',
			'cell_phone_number' => 'Cell Phone Number',
			'telephone_number_house' => 'Telephone Number House',
			'telephone_number_office' => 'Telephone Number Office',
			'extension_office' => 'Extension Office',
			'active' => 'Active',
		);*/
                
               
                return array(
			'id' => 'ID',
                        'customer_id' => 'Cliente',
			'name' => 'Nombre de contacto',
			'email' => 'Correo electrónico de contacto',
			'cell_phone_number' => 'Número teléfono celular de contacto',
			'telephone_number_house' => 'Número teléfono casa de contacto',
			'telephone_number_office' => 'Numero teléfono oficina de contacto',
			'extension_office' => 'Extension de oficina',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('cell_phone_number',$this->cell_phone_number,true);
		$criteria->compare('telephone_number_house',$this->telephone_number_house,true);
		$criteria->compare('telephone_number_office',$this->telephone_number_office,true);
		$criteria->compare('extension_office',$this->extension_office,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}