<?php

/**
 * This is the model class for table "{{repair_work}}".
 *
 * The followings are the available columns in table '{{repair_work}}':
 * @property string $id
 * @property string $work_id
 * @property string $user_id
 * @property string $repair_id
 * @property string $date_hour
 *
 * The followings are the available model relations:
 * @property Repair $repair
 * @property User $user
 * @property Work $work
 */
class RepairWork extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{repair_work}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, repair_id, date_hour', 'required'),
			array('work_id, user_id, repair_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, work_id, user_id, repair_id, date_hour', 'safe', 'on'=>'search'),
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
			'repair' => array(self::BELONGS_TO, 'Repair', 'repair_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'work' => array(self::BELONGS_TO, 'Work', 'work_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'work_id' => 'Lista de Trabajos',
			'user_id' => 'User',
			'repair_id' => 'Repair', //order_id
			'date_hour' => 'Date Hour',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('work_id',$this->work_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('repair_id',$this->repair_id,true);
		$criteria->compare('date_hour',$this->date_hour,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RepairWork the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
