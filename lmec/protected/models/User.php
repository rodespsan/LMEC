<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $id
 * @property string $user_name
 * @property string $password
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property BlogGuarantee[] $blogGuarantees
 * @property BlogOrder[] $blogOrders
 * @property BlogSpare[] $blogSpares
 * @property BlogStatusOrder[] $blogStatusOrders
 * @property BlogStatusOrder[] $blogStatusOrders1
 * @property Diagnostic[] $diagnostics
 * @property Order[] $orders
 * @property OutOrder[] $outOrders
 * @property RepairWork[] $repairWorks
 * @property TechnicalOrder[] $technicalOrders
 * @property UserRole[] $userRoles
 */
class User extends CActiveRecord
{

	public $password2;
	public $password3;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, password2, password3, name, last_name, email, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('user_name', 'length', 'min'=>8, 'max'=>20),
			array('email', 'email'),
			array('password2, password3', 'length', 'min'=>8, 'max'=>35),
			array('password2', 'compare', 'compareAttribute'=>'password3'),
			array('name, last_name, email', 'length', 'max'=>100),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_name, password, name, last_name, email, active', 'safe', 'on'=>'search'),
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
			'blogGuarantees' => array(self::HAS_MANY, 'BlogGuarantee', 'technician_user__id'),
			'blogOrders' => array(self::HAS_MANY, 'BlogOrder', 'user_technical_id'),
			'blogSpares' => array(self::HAS_MANY, 'BlogSpare', 'user_id'),
			'blogStatusOrders' => array(self::HAS_MANY, 'BlogStatusOrder', 'user_who_assigned_id'),
			'blogStatusOrders1' => array(self::HAS_MANY, 'BlogStatusOrder', 'user_assigned_id'),
			'diagnostics' => array(self::HAS_MANY, 'Diagnostic', 'user_technical_id'),
			'orders' => array(self::HAS_MANY, 'Order', 'receptionist_user_id'),
			'outOrders' => array(self::HAS_MANY, 'OutOrder', 'user_id'),
			'repairWorks' => array(self::HAS_MANY, 'RepairWork', 'user_id'),
			'technicalOrders' => array(self::HAS_MANY, 'TechnicalOrder', 'user_id'),
			//'userRoles' => array(self::HAS_MANY, 'UserRole', 'user_id'),
                    
                        'rols' => array(self::MANY_MANY, 'Role', 'tbl_user_role(user_id,role_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_name' => 'Nombre de usuario',
			'password' => 'Contraseña',
			'password2' => 'Contraseña',
			'password3' => 'Confirmar contraseña',
			'name' => 'Nombres',
			'last_name' => 'Apellidos',
			'email' => 'Correo',
			'active' => 'Activo',
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
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->condition = 'active = 1'; 	//mostrar solo los activos

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
        public function deleteLogic()
	{
	
	//var_dump($sql);
	$connection=Yii::app()->db;   
        
        //UPDATE tbl_user SET active = 0 WHERE 1
	$sql = 'UPDATE tbl_user SET active= 0 WHERE id = ' . $this->id ;
        
        $command=$connection->createCommand($sql);

        $dataReader=$command->query();
	
	}
}