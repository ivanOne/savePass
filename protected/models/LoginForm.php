<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
    public $login;
	public $password;
    public $identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('login, password', 'required','message'=>'Поле обязательно для заполнения'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'login' => 'Имя пользователя',
            'password' => 'Пароль'
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate()
	{
		if(!$this->hasErrors())
		{
			$identity=new UserIdentity($this->login,$this->password);
			if(!$identity->authenticate())
				$this->addError('password','Не верное имя пользователя или пароль.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->identity===null)
        {
			$this->identity=new UserIdentity($this->login,$this->password);
			$this->identity->authenticate();
		}
		if($this->identity->errorCode===UserIdentity::ERROR_NONE)
		{
			Yii::app()->user->login($this->identity);
			return true;
		}
		else
			return false;
	}


}
