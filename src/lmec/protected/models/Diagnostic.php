<?php

/**
 * This is the model class for table "{{diagnostic}}".
 *
 * The followings are the available columns in table '{{diagnostic}}':
 * @property string $id
 * @property string $order_id
 * @property string $user_id
 * @property string $service_type_id
 * @property string $date_hour
 * @property string $observation
 * @property integer $finished
 * @property integer $refection
 *
 * The followings are the available model relations:
 * @property Order $order
 * @property ServiceType $serviceType
 * @property User $user
 * @property Work[] $tblWorks
 */
class Diagnostic extends CActiveRecord
{
	


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{diagnostic}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, user_id, service_type_id, date_hour', 'required'),
			array('finished', 'numerical', 'integerOnly'=>true),
			array('refection', 'numerical', 'integerOnly'=>true),
			array('order_id, user_id, service_type_id', 'length', 'max'=>10),
            //array('work_id','exist','className'=>'Work','attributeName'=>'id'), 
			array('observation', 'safe'),
			array('finished', 'boolean'),
			array('refection','boolean'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, user_id, service_type_id, date_hour, observation, finished, refection', 'safe', 'on'=>'search'),
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
			'serviceType' => array(self::BELONGS_TO, 'ServiceType', 'service_type_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'works' => array(self::MANY_MANY, 'Work', '{{diagnostic_work}}(diagnostic_id, work_id)'),
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
			'user_id' => 'Usuario',
			'service_type_id' => 'Tipo de Servicio',
			'date_hour' => 'Fecha',
			'observation' => 'Observación',
			'finished' => 'Finalizado',
			'refection'=>'Refacción'
			
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('service_type_id',$this->service_type_id,true);
		$criteria->compare('date_hour',$this->date_hour,true);
		$criteria->compare('observation',$this->observation,true);
		$criteria->compare('finished',$this->finished);
		$criteria->compare('refection',$this->finished);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
                        'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                    ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Diagnostic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getFinishedText()
	{
	return ($this->finished)? 'Si': 'No';
	
	}
	public function getRefectionText()
	{
	return ($this->refection)? 'Si': 'No';
	
	}

    public function getWorks($idDiagnostic)
    {   
 
      $modelDiagnostic = Diagnostic::model()->findByPk($idDiagnostic);
      $workNames="";
      
      foreach($modelDiagnostic->works as $work)
      {
        $w = $work->name;

        $workNames= $workNames.'<li>'.$w.'<br>' ;
      }
      return $workNames;
    }
	
	


}
