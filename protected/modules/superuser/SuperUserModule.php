<?php

class SuperUserModule extends CWebModule
{
    public $login;
    public $password;

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		// import the module-level models and components
		$this->setImport(array(
			'superuser.models.*',
			'superuser.components.*',
		));



	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
            Yii::app()->user->loginUrl=Yii::app()->createUrl('superuser/users/login');
            return true;
		}
		else
			return false;
	}
}
