<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the user and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
	 /*
     * @var ID del usuario identificado.
     */
	 private $_id;
	 /*
     * @var usuario activo 
     */
	 const ACTIVE = 1;
	 /*
     * @var Error de usuario eliminado (baja logica).
     */
	 const ERROR_NO_ACTIVE_USER = 3;
	 /*
	 * @var Error de usuario sin roles.
	 */
	 const ERROR_NO_ROLES_USER = 4;
	 
	 /**
	 * Descripcion: autentifica si el usuario existe y valida si un usuario esta activo.
	 * @return error o sin errores.
	 */
	public function authenticate()
	{
		$ModelUser = User::model()->findByAttributes(array('user'=>$this->username));
		if ($ModelUser===null) 
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else if ($this->authenticateCryptPassword($ModelUser->password)) 
		{
			if($ModelUser->active == self::ACTIVE)
			{
				if(count($this->getUserRoles($ModelUser)) == 0)
				{
					$this->errorCode=self::ERROR_NO_ROLES_USER;
				}else
				{
					$this->setState('roles', $this->getUserRoles($ModelUser));
					$this->_id = $ModelUser->id;
					$this->errorCode=self::ERROR_NONE;
				}
			}
			else {
				$this->errorCode=self::ERROR_NO_ACTIVE_USER;
			}
		} 
		else {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
	return !$this->errorCode;
	}
	
	 /**
	 * Descripcion: get id.
	 * @return el id del usuario logueado.
	 */
	public function getId()
    {
        return $this->_id;
    }
	
	 /**
	 * Descripcion: verifica que el password es igual al encriptado en la base de datos.
	 * @return verdaderos si el password coincide si no retorna falso.
	 */
	 private function authenticateCryptPassword($userPassword)
	 {
		return crypt($this->password,$userPassword) === $userPassword;
	 }
	 
	 /**
	 * Descripcion: retorna todos los roles con los que cuenta el usuario logueado.
	 * @return un array con Roles. ej. "{0}administrador,{1}tecnico,{2}estadista, etc.".
	 * /components/WebUser.php
	 */
	 private function getUserRoles($ModelUser)
	 {
		$roles = array();
		foreach ($ModelUser->roles as $role) 
		{
			if($role->active == self::ACTIVE)
			{
				array_push($roles, strtolower($role->name));
			}
        }
		return $roles;
	 }	 
}