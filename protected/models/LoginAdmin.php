<?php


class LoginAdmin extends CFormModel
{
    public $username;
    public $password;
    public $ident;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // username and password are required
            array('username, password', 'required','message'=>'Поле обязательно для заполнения'),
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
            'username' => 'Имя пользователя',
            'password' => 'Пароль'
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */

    public function authenticate($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $this->ident=new AdminIdentity($this->username,$this->password);
            if(!$this->ident->authenticate())
                $this->addError('password','Не верное имя пользователя или пароль.');
        }
    }
    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */


    public function login()
    {
        if($this->ident===null)
        {
            $this->ident=new AdminIdentity($this->username,$this->password);
            $this->ident->authenticate();
        }
        if($this->ident->errorCode===AdminIdentity::ERROR_NONE)
        {
            Yii::app()->user->login($this->ident);
            return true;
        }
        else
            return false;
    }
} 