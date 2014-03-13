<?php

/**
 * This is the model class for table "{{customer_type}}".
 *
 * The followings are the available columns in table '{{customer_type}}':
 * @property string $id
 * @property string $type
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Customer[] $customers
 */
class CustomerType extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CustomerType the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{customer_type}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type, active', 'required'),
            array('type', 'unique'),
            array('active', 'numerical', 'integerOnly' => true),
            array('type', 'length', 'max' => 45),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, type, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'customers' => array(self::HAS_MANY, 'Customer', 'customer_type_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'type' => 'Tipo de cliente',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('active', $this->active, false);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                    ),
                ));
    }

    public static function getActive($active) {
        if ($active == '1') {
            return 'Si';
        } else if ($active == '0') {
            return 'No';
        }
    }

    public static function getActiveCustomerTypes() {
        $customer_types = array('' => "Seleccionar");
        $customer_types += CHtml::ListData(CustomerType::model()->findAll('t.active = 1'), 'id', 'type');
        return $customer_types;
    }

    public function onBeforeValidate() {
        foreach ($this->getIterator() as $atributo => $valor)
            $this[$atributo] = trim($valor);
    }

}