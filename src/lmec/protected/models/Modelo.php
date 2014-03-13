<?php

/**
 * This is the model class for table "tbl_model".
 *
 * The followings are the available columns in table 'tbl_model':
 * @property string $id
 * @property string $brand_id
 * @property string $equipment_type_id
 * @property string $model
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property TblBrand $brand
 * @property TblEquipmentType $equipmentType
 * @property TblOrder[] $tblOrders
 */
class Modelo extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Modelo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_model';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('brand_id, equipment_type_id, name, active', 'required'),
            array('active', 'numerical', 'integerOnly' => true),
            array('brand_id, equipment_type_id', 'length', 'max' => 10),
            array('name', 'unique', 'message' => 'El {attribute} ya existe.'),
            array('name', 'length', 'max' => 200, 'message' => 'El {attribute} es muy largo'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, brand_id, equipment_type_id, name, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Brand' => array(self::BELONGS_TO, 'Brand', 'brand_id'),
            'EquipmentType' => array(self::BELONGS_TO, 'EquipmentType', 'equipment_type_id'),
            'Orders' => array(self::HAS_MANY, 'Order', 'model_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'brand_id' => 'Marca',
            'equipment_type_id' => 'Tipo de equipo',
            'name' => 'Modelo',
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

        $criteria->compare('t.id', $this->id, true);
        $criteria->with = array('Brand', 'EquipmentType');
        $criteria->addSearchCondition('LOWER(Brand.name)', strtolower($this->brand_id));
        $criteria->addSearchCondition('LOWER(EquipmentType.type)', strtolower($this->equipment_type_id));
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('t.active', $this->active);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                    ),
                ));
    }

    public static function getActive($active) {
        if ($active == 1) {
            return "Si";
        } else {
            if ($active == 0) {
                return "No";
            }
        }
    }
	
	

}
