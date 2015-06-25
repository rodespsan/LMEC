<?php

/**
 * This is the model class for table "{{blog_guarantee}}".
 *
 * The followings are the available columns in table '{{blog_guarantee}}':
 * @property string $id
 * @property string $order_id
 * @property string $activity_guarantee_id
 * @property string $technician_user_id
 * @property string $date_hour
 *
 * The followings are the available model relations:
 * @property ActivityGuarantee $activityGuarantee
 * @property Order $order
 * @property User $technicianUser
 */
class BlogGuarantee extends CActiveRecord {

    public $finished;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{blog_guarantee}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('activity_guarantee_id, technician_user_id, date_hour', 'required'),
            array('activity_guarantee_id, technician_user_id', 'length', 'max' => 10),
            array('active', 'numerical', 'integerOnly'=>true),
            array('finished', 'numerical', 'integerOnly' => true),
            array('finished', 'safe'),
            array('order_id', 'exist', 'className'=>'Order', 'attributeName'=>'id'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, order_id, activity_guarantee_id, technician_user_id, date_hour, observation, active, finished', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'activityGuarantee' => array(self::BELONGS_TO, 'ActivityGuarantee', 'activity_guarantee_id'),
            'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
            'technicianUser' => array(self::BELONGS_TO, 'User', 'technician_user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'order_id' => 'Orden',
            'activity_guarantee_id' => 'Actividad',
            'technician_user_id' => 'Técnico',
            'date_hour' => 'Fecha y Hora',
            'observation' => 'Observación',
            'active' => 'Activo',
            'finished' => 'Finalizado'
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.


        
        $criteria = new CDbCriteria;

        $criteria->with = array('activityGuarantee', 'technicianUser');
        $criteria->together = true;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('order_id', $this->order_id, true);
        $criteria->compare('activityGuarantee.description', $this->activity_guarantee_id, true);
        $criteria->compare('technicianUser.user', $this->technician_user_id, true);
        $criteria->compare('date_hour', $this->date_hour, true);
        $criteria->compare('observation', $this->observation, true);
        $criteria->compare('active', $this->active, true);
        
//        $criteria->condition = "order_id = ".$id." ";

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'multiSort' => true,
                'attributes' => array(
                    'order_id', 'date_hour',
                ),
                'defaultOrder' => array(
                    'order_id' => CSort::SORT_DESC, 
                    'date_hour' => CSort::SORT_DESC,
                ),
            ),
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BlogGuarantee the static model class
     */
    public static function model($className = __CLASS__) {
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
