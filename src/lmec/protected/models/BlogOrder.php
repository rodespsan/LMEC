<?php

/**
 * This is the model class for table "{{blog_order}}".
 *
 * The followings are the available columns in table '{{blog_order}}':
 * @property string $id
 * @property string $order_id
 * @property string $activity
 * @property string $detailed_activity
 * @property string $user_technical_id
 * @property string $date_hour
 *
 * The followings are the available model relations:
 * @property Order $order
 * @property User $userTechnical
 */
class BlogOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{blog_order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, activity, user_technical_id, date_hour', 'required'),
			array('order_id, user_technical_id', 'length', 'max'=>10),
			array('activity', 'length', 'max'=>200),
			array('detailed_activity', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, activity, detailed_activity, user_technical_id, date_hour', 'safe', 'on'=>'search'),
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
			'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
			'userTechnical' => array(self::BELONGS_TO, 'User', 'user_technical_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Orden',
			'activity' => 'Actividad',
			'detailed_activity' => 'Actividad Detallada',
			'user_technical_id' => 'Técnico',
			'date_hour' => 'Fecha',
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
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('activity',$this->activity,true);
		$criteria->compare('detailed_activity',$this->detailed_activity,true);
		$criteria->compare('user_technical_id',$this->user_technical_id,true);
		$criteria->compare('date_hour',$this->date_hour,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BlogOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
