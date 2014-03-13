<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $id
 * @property string $user
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
class User extends CActiveRecord {

    public $_password2;
    public $_confirm_password;
    public $_selected_roles;
    public $_roles = "";

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.

        return array(
            array('user, name, last_name, email, active', 'required'),
            array('name, last_name, email', 'length', 'max' => 100),
            array('user', 'unique', 'message' => 'Usuario no disponible, elegir otro.', 'on' => array('scenarioCreate', 'scenarioUpdate')),
            array('user', 'validateSpacesOnUser', 'on' => array('scenarioCreate', 'scenarioUpdate')),
            array('_password2', 'validateSpacesOnPassword', 'on' => array('scenarioCreate')),
            array('_password2, _confirm_password', 'required', 'on' => 'scenarioCreate'),
            array('_confirm_password', 'compare', 'compareAttribute' => '_password2', 'on' => 'scenarioCreate'),
            array('_password2', 'validateSpacesOnConfirmPassword', 'on' => array('scenarioCreate', 'scenarioUpdate')),
            array('user', 'length', 'min' => 3, 'max' => 20),
            array('_password2', 'length', 'min' => 8, 'max' => 20),
            array('_confirm_password', 'length', 'min' => 8, 'max' => 20),
            array('_selected_roles', 'required', 'message' => 'Seleccionar al menos un rol.', 'on' => array('scenarioCreate', 'scenarioUpdate')),
            array('_selected_roles', 'validateRoles', 'on' => 'scenarioCreate', 'scenarioUpdate'),
            array('email', 'email', 'message' => 'El correo no está en formato válido.', 'on' => array('scenarioCreate', 'scenarioUpdate')),
            array('active', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user, _roles ,name, last_name, email, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
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
            'roles' => array(self::MANY_MANY, 'Role', 'tbl_user_role(user_id,role_id)', 'alias' => 'roles'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'user' => 'Usuario',
            '_password2' => 'Contraseña',
            '_confirm_password' => 'Confirmar contraseña',
            'name' => 'Nombre de usuario',
            'last_name' => 'Apellidos',
            'email' => 'Correo electrónico',
            '_selected_roles' => 'Roles',
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
        $criteria->with = array('roles');
        $criteria->group = 't.id, t.user, t.name, t.last_name, t.email, t.active';
        $criteria->together = true;

        $criteria->select = 't.id, t.user, t.last_name, t.email, t.active, roles.name';

        $criteria->compare('roles.name', $this->_roles, true);
        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.user', $this->user, true);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('t.last_name', $this->last_name, true);
        $criteria->compare('t.email', $this->email, true);
        $criteria->compare('t.active', $this->active, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
                    ),
                    'sort' => array(
                        'attributes' => array(
                            '_roles' => array(
                                'asc' => 'roles.name',
                                'desc' => 'roles.name DESC',
                            ),
                            '*',
                        ),
                    ),
                ));
    }

    public function validateSpacesOnUser($attribute, $params) {
        $space = " ";
        $user_contain_space = strstr($this->user, $space);
        $not_contain_spaces = false;

        if ($user_contain_space != $not_contain_spaces) {
            $this->addError('user', 'El usuario no debe contener espacios.');
        }
    }

    public function validateSpacesOnPassword($attribute, $params) {
        $space = " ";
        $password_contain_space = strstr($this->_password2, $space);
        $not_contain_spaces = false;

        if ($password_contain_space != $not_contain_spaces) {
            $this->addError('_password2', 'La contraseña no debe contener espacios.');
        }
    }

    public function validateSpacesOnConfirmPassword($attribute, $params) {
        $space = " ";
        $password_contain_space = strstr($this->_password2, $space);
        $not_contain_spaces = false;

        if ($password_contain_space != $not_contain_spaces) {
            $this->addError('_confirm_password', 'Confirmar contraseña no debe contener espacios.');
        }
    }

    public function validateRoles($attribute, $params) {
        if (!is_array($this->_selected_roles)) {
            $this->addError('_selected_roles', 'Rol seleccionado incorrectamente.');
        } else {
            $ids_actives_roles = $this->getIdsActiveRoles();

            foreach ($this->_selected_roles as $selected_role) {
                if (!in_array($selected_role, $ids_actives_roles)) {
                    $this->addError('_selected_roles', 'Valor incorrecto de rol');
                }
            }
        }
    }

    private function getIdsActiveRoles() {
        $actives_roles = Role::model()->findAll('active = 1 ');
        $ids = array();

        foreach ($actives_roles as $active) {
            $ids[] = $active->id;
        }
        return $ids;
    }

    public function getActiveRoles() {
        return Role::model()->findAll('active = 1');
    }

    public function assignRolesToUser($user_id) {
		
		$successful = true;
		
        foreach ($this->_selected_roles as $id_selected_role) {
            $model = new UserRole;
            $model->user_id = $user_id;
            $model->role_id = $id_selected_role;
            if(  !$model->save() )
			{
				return ! $successful;
			}
        }
		return $successful;
    }

    public static function getExistingRolesOfUser($user_id) {
        $user = User::model()->findByPk($user_id);
        $roles_existing = array();

        foreach ($user->roles as $rol) {
            $id_role = $rol->id;
            $roles_existing[] = $id_role;
        }

        return $roles_existing;
    }

    public function deleteRolesOfUser($user_id) {
        UserRole::model()->deleteAll('user_id =' . $user_id); //return number affected line 
    }

    public function encryptPassword() {
        $this->password = $this->encrypt($this->_password2);
    }

    private function encrypt($value) {
        return crypt($value);
    }

    public static function getRolesOfUser($id) {
        $user = User::model()->findByPk($id);
        $rolesOfUser = "";

        foreach ($user->roles as $rol) {
            $role = $rol->name;
            $rolesOfUser .= $role . '<br>';
        }
        return $rolesOfUser;
    }

    public static function getActive($active) {
	
        if ($active == '1') {
		
            return 'Si';
        } 
		else if ($active == '0') {
		
            return 'No';
        }
    }

}