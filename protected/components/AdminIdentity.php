<?php

class AdminIdentity extends CUserIdentity
{
    public function authenticate()
    {
        if((strnatcmp($this->username,Yii::app()->getModule('superuser')->login)!==0) and (strnatcmp($this->password,Yii::app()->getModule('superuser')->password)!==0))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
} 