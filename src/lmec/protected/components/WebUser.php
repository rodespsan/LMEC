<?php
class WebUser extends CWebUser
{
    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
    public function checkAccess($privilegesGrantedTo, $params=array())
    {
        if (empty($this->id)) // Not identified => no rights
		{ 
            return false;
        }
		else 
		{
			// Array de roles.
			$UserRolesLogged = $this->getState("roles");
			
			// Si es administrador tiene privilegios a todo.
			if ($UserRolesLogged === 'administrador' || $privilegesGrantedTo == '*')
			{
				return true;
			}
			if ($this->validateAccess($privilegesGrantedTo, $UserRolesLogged) == true)
			{
				return true;
			}
		}
		return false;
	}
	
	public function validateAccess($privilegesGrantedTo, $UserRolesLogged)
	{
		if(in_array($privilegesGrantedTo, $UserRolesLogged))
		{
			return true;
		}
	}
}