<?php

/**
 * This is the model class for table "{{spare_parts}}".
 *
 * The followings are the available columns in table '{{spare_parts}}':
 * @property string $id
 * @property string $brand_id
 * @property string $spare_parts_status_id
 * @property string $provider_id
 * @property string $name_spare
 * @property string $serial_number
 * @property string $price
 * @property string $date_hour
 * @property string $guarantee_period
 * @property string $invoice
 * @property string $description
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property ProviderSpare[] $providerSpares
 * @property Brand $name
 * @property Provider $provider
 * @property SparePartsStatus $spareStatus
 * @property SpareOrder[] $spareOrders
 */
class SpareParts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Spare the static model class
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
		return '{{spare_parts}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brand_id, spare_parts_status_id, provider_id, name, price, date_hour, guarantee_period', 'required'),
			array('invoice', 'length', 'max'=>20),
			array('brand_id, spare_parts_status_id, provider_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>100),
			array('serial_number', 'length', 'max'=>50),
			array('price', 'length', 'max'=>7),
			array('description', 'length', 'max'=>500),
			array('date_hour', 'date', 'format' => 'yyyy-MM-dd'),
			array('guarantee_period', 'date', 'format' => 'yyyy-MM-dd'),
			array('guarantee_period', 'compare', 'compareAttribute'=>'date_hour', 'operator'=>'>='),
			array('guarantee_period', 'safe'),
			array('active', 'boolean'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, brand_id, spare_parts_status_id, provider_id, name, serial_number, price, date_hour, guarantee_period, invoice, description, active', 'safe', 'on'=>'search'),
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
			'providerSpares' => array(self::HAS_MANY, 'ProviderSpare', 'spare_id'),
			'brand' => array(self::BELONGS_TO, 'Brand', 'brand_id'),
			'provider' => array(self::BELONGS_TO, 'Provider', 'provider_id'),
			'sparePartsStatus' => array(self::BELONGS_TO, 'SparePartsStatus', 'spare_parts_status_id'),
			'spareOrders' => array(self::HAS_MANY, 'SpareOrder', 'spare_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'brand_id' => 'Marca',
			'spare_parts_status_id' => 'Estado de Refacción',
			'provider_id' => 'Proveedor',
			'name' => 'Nombre Refacción',
			'serial_number' => 'Número de Serie',
			'price' => 'Precio',
			'date_hour' => 'Fecha de Compra',
			'guarantee_period' => 'Fecha de Vencimiento de Garantía',
			'invoice' => 'Número de Factura',
			'description' => 'Descripción',
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
		$criteria->with=array('brand','sparePartsStatus','provider');

		$criteria->compare('t.id',$this->id,true);
		//$criteria->compare('brand_id',$this->brand_id,true);
		$criteria->compare('brand.name',$this->brand->name,true);
		//$criteria->compare('spare_parts_status_id',$this->spare_parts_status_id,true);
		$criteria->compare('sparePartsStatus.description',$this->sparePartsStatus->description,true);
		//$criteria->compare('provider_id',$this->provider_id,true);
		$criteria->compare('provider.name',$this->provider->name,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('serial_number',$this->serial_number,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('date_hour',$this->date_hour,true);
		$criteria->compare('guarantee_period',$this->guarantee_period,true);
		$criteria->compare('invoice',$this->invoice);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('t.active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
			'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
		));
	}
	
	
	public function getActiveText(){
		return ($this->active)?'Si':'No';
	}
	
	
}