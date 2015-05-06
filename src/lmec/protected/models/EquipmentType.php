<?php

/**
 * This is the model class for table "tbl_equipment_type".
 *
 * The followings are the available columns in table 'tbl_equipment_type':
 * @property string $id
 * @property string $type
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property TblEquipmentTypeAccessory[] $tblEquipmentTypeAccesories
 * @property TblModel[] $tblModels
 */
class EquipmentType extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EquipmentType the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_equipment_type';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type, active', 'required'),
            array('active', 'numerical', 'integerOnly' => true),
            array('type', 'unique', 'message' => 'El {attribute} ya existe.'),
            array('type', 'length', 'max' => 45, 'message' => 'El {attribute} es muy largo'),
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
            'EquipmentType' => array(self::HAS_MANY, 'EquipmentType', 'equipment_type_id'),
            'Modelos' => array(self::HAS_MANY, 'Models', 'equipment_type_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'type' => 'Tipo de equipo',
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
        $criteria->compare('active', $this->active);

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