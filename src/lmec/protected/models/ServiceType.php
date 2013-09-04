<?php

/**
 * This is the model class for table "{{service_type}}".
 *
 * The followings are the available columns in table '{{service_type}}':
 * @property string $id
 * @property string $name
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property ActivityVerification[] $activityVerifications
 * @property Diagnostic[] $diagnostics
 * @property Order[] $orders
 * @property Service[] $services
 * @property Work[] $works
 */
class ServiceType extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ServiceType the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{service_type}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, active', 'required'),
            array('active', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 50),
            array('name', 'unique', 'message' => 'Tipo de servicio ya existe.'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'activityVerifications' => array(self::HAS_MANY, 'ActivityVerification', 'service_type_id'),
            'diagnostics' => array(self::HAS_MANY, 'Diagnostic', 'service_type_id'),
            'orders' => array(self::HAS_MANY, 'Order', 'service_type_id'),
            'services' => array(self::HAS_MANY, 'Service', 'service_type_id'),
            'works' => array(self::HAS_MANY, 'Work', 'service_type_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'name' => 'Tipo de servicio',
            'active' => 'Activo',
        );
    }

    public static function getActive($active) {
        if ($active == '1') {
            return 'Si';
        } else {
            return 'No';
        }
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function logical_deletion() {
        $result = $this->updateByPk($this->id, array("active" => '0'));
    }

}