<?php

/**
 * This is the model class for table "{{work}}".
 *
 * The followings are the available columns in table '{{work}}':
 * @property string $id
 * @property string $service_type_id
 * @property string $name
 * @property string $description
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property RepairWork[] $repairWorks
 * @property ServiceType $serviceType
 * @property WorkOrder[] $workOrders
 */
class Work extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Work the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{work}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('service_type_id, name, active', 'required'),
            array('active', 'numerical', 'integerOnly' => true),
            array('service_type_id', 'length', 'max' => 10),
            array('name', 'length', 'max' => 200),
            array('description', 'length', 'max' => 500),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, service_type_id, name, description, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'repairWorks' => array(self::HAS_MANY, 'RepairWork', 'work_id'),
            'serviceType' => array(self::BELONGS_TO, 'ServiceType', 'service_type_id'),
            'workOrders' => array(self::HAS_MANY, 'WorkOrder', 'work_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'service_type_id' => 'Tipo de servicio',
            'name' => 'Nombre del trabajo',
            'description' => 'Descripción',
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
	public function getDataActive(){
		if($this->active){
		//return $this->serviceType->name.'</td> <td>'.$this->name.'</td>';
		return $this;
		}else{
			return '';
		}
	}

}