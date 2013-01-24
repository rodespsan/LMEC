<?php

/**
 * This is the model class for table "{{dependence}}".
 *
 * The followings are the available columns in table '{{dependence}}':
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $telephone_number
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Customer[] $customers
 */
class Dependence extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dependence the static model class
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
		return '{{dependence}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, telephone_number, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('name, address', 'length', 'max'=>45),
			array('telephone_number', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, telephone_number, active', 'safe', 'on'=>'search'),
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
			'customers' => array(self::HAS_MANY, 'Customer', 'dependence_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nombre',
			'address' => 'Dirección',
			'telephone_number' => 'Número Telefónico',
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('telephone_number',$this->telephone_number,true);
		$criteria->compare('active',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}