<?php

/**
 * This is the model class for table "{{activity_verification}}".
 *
 * The followings are the available columns in table '{{activity_verification}}':
 * @property string $id
 * @property string $service_type_id
 * @property string $activity
 * @property string $description
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property ServiceType $serviceType
 * @property ActivityVerificationOrder[] $activityVerificationOrders
 */
class ActivityVerification extends CActiveRecord
{
    public $equipment_type_id;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{activity_verification}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_type_id, equipment_type_id', 'required'),
            array('active', 'boolean'),
			array('service_type_id', 'length', 'max'=>10),
			array('activity', 'length', 'max'=>100),
			array('description', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, service_type_id, equipment_type_id,activity, description, active', 'safe', 'on'=>'search'),
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
			'serviceType' => array(self::BELONGS_TO, 'ServiceType', 'service_type_id'),
                        'equipmentType' => array(self::BELONGS_TO, 'equipmentType', 'equipment_type_id'),
			'activityVerificationOrders' => array(self::HAS_MANY, 'ActivityVerificationOrder', 'activity_verification_id'),
		);  
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'service_type_id' => 'Tipo de Servicio',
                        'equipment_type_id' => 'Tipo de Equipo',
			'activity' => 'Nombre',
			'description' => 'Descripción',
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

		$criteria->compare('t.id',$this->id,true);
                $criteria->with = array('serviceType', 'equipmentType');
                $criteria->addSearchCondition('LOWER(ServiceType.name)', strtolower($this->service_type_id));
                $criteria->addSearchCondition('LOWER(EquipmentType.type)', strtolower($this->equipment_type_id));
//		
		$criteria->compare('t.activity',$this->activity,true);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('t.active',$this->active);

		
                 return new CActiveDataProvider($this, array(
                        'criteria' => $criteria,
                        'pagination' => array(
                        'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                       ),
                    ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ActivityVerification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
