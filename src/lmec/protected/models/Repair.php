<?php

/**
 * This is the model class for table "{{repair}}".
 *
 * The followings are the available columns in table '{{repair}}':
 * @property string $id
 * @property string $order_id
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Order $order
 * @property RepairWork[] $repairWorks
 */
class Repair extends CActiveRecord {

    public $finished;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{repair}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('order_id', 'length', 'max' => 10),
            array('finished', 'numerical', 'integerOnly' => true),
            //OR optional 
            array('finished', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, order_id, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
            'repairWorks' => array(self::HAS_MANY, 'RepairWork', 'repair_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'order_id' => 'Orden',
            'description' => 'Descripción',
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


//		$criteria->compare('id',$this->id,true);
        $criteria->compare('order_id', $this->order_id, true);
        $criteria->compare('description', $this->description, true);

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
     * @return Repair the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
