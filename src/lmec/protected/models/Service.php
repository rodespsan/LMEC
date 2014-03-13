<?php

/**
 * This is the model class for table "{{service}}".
 *
 * The followings are the available columns in table '{{service}}':
 * @property string $id
 * @property string $service_type_id
 * @property string $name
 * @property string $price
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property QuotationService[] $quotationServices
 * @property ServiceType $serviceType
 * @property ServiceOrder[] $serviceOrders
 * @property ServicePerformedOrder[] $servicePerformedOrders
 */
class Service extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Service the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{service}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('code, service_type_id, name, price, active', 'required'),
            array('active', 'numerical', 'integerOnly' => true),
            array('service_type_id', 'length', 'max' => 10),
            array('name', 'length', 'max' => 50),
			array('code', 'length', 'max' => 50),
			array('code', 'unique'),
            array('name', 'unique', 'message' => 'Este servicio ya existe.'),
            array('price', 'length', 'max' => 7),
            array('price', 'numerical', 'integerOnly' => false),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, code, service_type_id, name, price, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'quotationServices' => array(self::HAS_MANY, 'QuotationService', 'service_id'),
            'serviceType' => array(self::BELONGS_TO, 'ServiceType', 'service_type_id'),
            'serviceOrders' => array(self::HAS_MANY, 'ServiceOrder', 'service_id'),
            'servicePerformedOrders' => array(self::HAS_MANY, 'ServicePerformedOrder', 'service_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
			'code' => 'Código',
            'service_type_id' => 'Tipo de servicio',
            'name' => 'Nombre',
            'price' => 'Precio',
            'active' => 'Activo',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->with = array('serviceType');

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('serviceType.name', $this->serviceType->name, true);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('price', $this->price, true);
		$criteria->compare('code', $this->code, true);
        $criteria->compare('t.active', $this->active);

        return new CActiveDataProvider(get_class($this), array(
                    'pagination' => array(
                        'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                    ),
                    'criteria' => $criteria,
                ));
    }

    public static function getActive($active) {
        if ($active == '1') {
            return 'Si';
        } else if ($active == '0') {
            return 'No';
        }
    }

    public static function getServiceType($serviceTypeId) {
        $serviceType = ServiceType::model()->findByPk($serviceTypeId);
        return $serviceType->name;
    }

    public static function getAllServices() {
        return Service::model()->count();
    }

    public function logical_deletion() {
        $result = $this->updateByPk($this->id, array("active" => '0'));
    }

}