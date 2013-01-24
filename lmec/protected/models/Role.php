<?php

/**
 * This is the model class for table "tbl_role".
 *
 * The followings are the available columns in table 'tbl_role':
 * @property string $id
 * @property string $role
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property UserRole[] $userRoles
 */
class Role extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Role the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_role';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('role', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, role, active', 'safe', 'on'=>'search'),
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
			//'userRoles' => array(self::HAS_MANY, 'UserRole', 'role_id'),
                    'rols' => array(self::MANY_MANY, 'User', 'tbl_user_role(user_id,role_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'role' => 'Rol',
			'active' => 'Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('role',$this->role,true);
		//$criteria->compare('active',$this->active);
		$criteria->condition = 'active = 1'; 	//mostrar solo los activos

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
}