<?php


class UserIdentity extends CUserIdentity
{
	public function authenticate()
	{
        $model=Users::model()->findByAttributes(array('login'=>$this->username));
		if($model!==null)
        {
            if(strnatcmp($this->username,$model->login)!==0)
            {
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            }
            elseif((strnatcmp($this->password,Users::model()->decryption($model->password))!==0))
            {
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }
            else
            {
                $this->setState('name', $model->name);
                $this->setState('id', $model->id);
                $this->errorCode=self::ERROR_NONE;
            }
        }
        else
            $this->errorCode=self::ERROR_USERNAME_INVALID;
		return !$this->errorCode;
	}

}
