<?php

/**
 * This is the model class for table "{{spare_parts}}".
 *
 * The followings are the available columns in table '{{spare_parts}}':
 * @property string $id
 * @property string $category_id
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
 *
 * The followings are the available model relations:
 * @property SparePartsCategory $category
 * @property Brand $brand
 * @property Provider $provider
 * @property SparePartsStatus $sparePartsStatus
 * @property SparePartsOrder[] $sparePartsOrders
 */
class SpareParts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpareParts the static model class
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
			array('category_id, brand_id, spare_parts_status_id, provider_id, name, price, date_hour, guarantee_period, active', 'required'),
            array('invoice', 'length', 'max' => 20),
            array('category_id, brand_id, spare_parts_status_id, provider_id', 'length', 'max' => 10),
            array('name', 'length', 'max' => 100),
            array('serial_number', 'length', 'max' => 50),
            array('price', 'length', 'max' => 7),
            array('description', 'length', 'max' => 500),
            array('date_hour', 'date', 'format' => 'yyyy-MM-dd'),
            array('guarantee_period', 'date', 'format' => 'yyyy-MM-dd'),
            array('guarantee_period', 'compare', 'compareAttribute' => 'date_hour', 'operator' => '>='),
            array('guarantee_period', 'safe'),
            array('active', 'numerical', 'integerOnly' => true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, spare_parts_status_id, brand_id, provider_id, name, serial_number, price, date_hour, guarantee_period, invoice, description, active', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'SparePartsCategory', 'category_id'),
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
			'id' => 'Id',
			'category_id' => 'Categoría',
            'brand_id' => 'Marca',
            'spare_parts_status_id' => 'Estado de refacción',
            'provider_id' => 'Proveedor',
            'name' => 'Nombre refacción',
            'serial_number' => 'Número de serie',
            'price' => 'Precio',
            'date_hour' => 'Fecha de compra',
            'guarantee_period' => 'Fecha de vencimiento de garantía',
            'invoice' => 'Número de factura',
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
		$criteria->with = array('brand', 'sparePartsStatus', 'provider', 'category');

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('category.code', $this->category->code, true);
        $criteria->compare('brand.name', $this->brand->name, true);
        $criteria->compare('sparePartsStatus.description', $this->sparePartsStatus->description, true);
        $criteria->compare('provider.name', $this->provider->name, true);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('serial_number', $this->serial_number, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('date_hour', $this->date_hour, true);
        $criteria->compare('guarantee_period', $this->guarantee_period, true);
        $criteria->compare('invoice', $this->invoice);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('t.active', $this->active);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                    ),
                ));
	}
	
	public function getActiveText() {
        return ($this->active) ? 'Si' : 'No';
    }
}