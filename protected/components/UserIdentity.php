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
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
        
    private $_id;
    
    public function authenticate()
    {
        $record=Usuario::model()->findByAttributes(array('BP'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->PASSWORD!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->BP;
            /** Define o role de acordo com o usr_tipo **/
			switch ($record->NIVEL_USUARIO) {
				case 1: $role = 'admin'; break;
				case 2: $role = 'user'; break;
				case 3: $role = 'analiz'; break;
				default:
					$role = '';
			}
			$this->setState('role', $role);
            $this->setState('title', $record->NOMBRE);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}