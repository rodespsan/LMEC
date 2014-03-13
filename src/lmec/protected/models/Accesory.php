<?php

/**
 * This is the model class for table "tbl_accesory".
 *
 * The followings are the available columns in table 'tbl_accesory':
 * @property string $id
 * @property string $name
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property TblAccesoryOrder[] $tblAccesoryOrders
 * @property TblEquipmentTypeAccesory[] $tblEquipmentTypeAccesories
 */
class Accesory extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Accesory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{accesory}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, active', 'required'),
            array('name', 'unique', 'message' => 'Accesorio registrado anteriormente.'),
            array('active', 'numerical', 'integerOnly' => true),
            array('name', 'unique', 'message' => 'El {attribute} ya existe'),
            array('name', 'length', 'max' => 100, 'message' => 'El {attribute} es muy largo'),
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
            'tblAccesoryOrders' => array(self::HAS_MANY, 'TblAccesoryOrder', 'accesory_id'),
            'tblEquipmentTypeAccesories' => array(self::HAS_MANY, 'TblEquipmentTypeAccesory', 'accesory_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'name' => 'Nombre',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('active', $this->active, true);

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
	
	public function getNames(){
		if($this->active){
			return $this->name;
		}
	}

}