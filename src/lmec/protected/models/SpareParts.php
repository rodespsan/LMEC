<?php 

/**
 * This is the model class for table "{{spare_parts}}".
 *
 * The followings are the available columns in table '{{spare_parts}}':
 * @property string $id
 * @property string $spare_parts_type_id
 * @property string $spare_parts_status_id
 * @property string $brand_id
 * @property string $provider_id
 * @property string $name
 * @property string $serial_number
 * @property string $price
 * @property string $date_hour
 * @property string $guarantee_period
 * @property string $invoice
 * @property string $description
 * @property integer $active
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Brand $brand
 * @property Provider $provider
 * @property SparePartsStatus $sparePartsStatus
 * @property SparePartsOrder[] $sparePartsOrders
 */
class SpareParts extends CActiveRecord
{
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
			array('spare_parts_type_id, spare_parts_status_id, brand_id, provider_id, name, price, date_hour', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('assigned', 'numerical', 'integerOnly'=>true),
			array('spare_parts_type_id, spare_parts_status_id, brand_id, provider_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>100),
			array('serial_number', 'length', 'max'=>50),
			array('price', 'length', 'max'=>7),
			array('invoice', 'length', 'max'=>20),
			array('description', 'length', 'max'=>500),
			array('guarantee_period', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, spare_parts_status_id, spare_parts_type_id, brand_id, provider_id, name, serial_number, price, date_hour, guarantee_period, invoice, description, active', 'safe', 'on'=>'search'),
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
			'sparePartsType' => array(self::BELONGS_TO, 'SparePartsType', 'spare_parts_type_id'),
			'brand' => array(self::BELONGS_TO, 'Brand', 'brand_id'),
			'provider' => array(self::BELONGS_TO, 'Provider', 'provider_id'),
			'sparePartsStatus' => array(self::BELONGS_TO, 'SparePartsStatus', 'spare_parts_status_id'),
			'sparePartsOrders' => array(self::HAS_MANY, 'SparePartsOrder', 'spare_parts_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'spare_parts_type_id' => 'Tipo de Refacción',
			'spare_parts_status_id' => 'Estado de Refacción',
			'brand_id' => 'Marca',
			'provider_id' => 'Provedor',
			'name' => 'Nombre',
			'serial_number' => 'Número de Serie',
			'price' => 'Precio',
			'date_hour' => 'Fecha',
			'guarantee_period' => 'Período de Garantía',
			'invoice' => 'Factura',
			'description' => 'Descripción',
			'assigned' => 'Asignado a Orden',
			'active' => 'Activo',
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
		$criteria->with = array('sparePartsStatus','sparePartsType','brand','provider');
		$criteria->together = true;

		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('sparePartsType.type',$this->spare_parts_type_id,true);
		$criteria->compare('sparePartsStatus.description',$this->spare_parts_status_id,true);
		$criteria->compare('brand.name',$this->brand_id,true);
		$criteria->compare('provider.name',$this->provider_id,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.serial_number',$this->serial_number,true);
		$criteria->compare('t.price',$this->price,true);
		$criteria->compare('t.date_hour',$this->date_hour,true);
		$criteria->compare('t.guarantee_period',$this->guarantee_period,true);
		$criteria->compare('t.invoice',$this->invoice,true);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('t.active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		// return new CActiveDataProvider($this, array(
  //                   'criteria' => $criteria,
  //                   'pagination' => array(
  //                       'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
  //                   ),
  //                   'sort' => array(
  //                       'attributes' => array(
  //                           'spare_parts_type_id' => array(
  //                               'asc' => 'sparePartsType.id',
  //                               'desc' => 'sparePartsType.id DESC',
  //                           ),
  //                           'spare_parts_status_id' => array(
  //                               'asc' => 'sparePartsStatus.id',
  //                               'desc' => 'sparePartsStatus.id DESC',
  //                           ),
  //                           'brand_id' => array(
  //                               'asc' => 'brand.id',
  //                               'desc' => 'brand.id DESC',
  //                           ),
  //                           'provider_id' => array(
  //                               'asc' => 'provider.id',
  //                               'desc' => 'provider.id DESC',
  //                           ),
  //                           '*',
  //                       ),
  //                   ),
  //               ));



	}
	
	public function searchAssign()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('sparePartsStatus','sparePartsType','brand','provider');
		$criteria->together = true;

		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('sparePartsType.type',$this->spare_parts_type_id,true);
		$criteria->compare('sparePartsStatus.description',$this->spare_parts_status_id,true);
		$criteria->compare('brand.name',$this->brand_id,true);
		$criteria->compare('provider.name',$this->provider_id,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.serial_number',$this->serial_number,true);
		$criteria->compare('t.price',$this->price,true);
		$criteria->compare('t.date_hour',$this->date_hour,true);
		$criteria->compare('t.guarantee_period',$this->guarantee_period,true);
		$criteria->compare('t.invoice',$this->invoice,true);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('t.active',$this->active);
		//$criteria->compare('t.assigned',$this->assigned);
		$criteria->addCondition('assigned=0','AND');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SpareParts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getActiveText(){ //echo $object->activeText ::: echo $object->getActiveText()
		return ($this->active)? 'Si' : 'No';
	}
}
