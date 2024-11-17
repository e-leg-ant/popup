<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    const USER_ROLE = 'role';

    /**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $user = Users::model()->find('LOWER(login)=?', array(strtolower($this->name)));

        if (null === $user) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (md5($this->password) !== $user->password) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } elseif ( Users::STATE_DISABLED == $user->state) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
            $user->prev_role = $user->role;
            $user->last_login = date('Y-m-d H:i:s');
            $user->save(false);
        }

        return !$this->errorCode;
	}

}