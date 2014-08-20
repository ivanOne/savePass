<?php

/**
 * This is the model class for table "info".
 *
 * The followings are the available columns in table 'info':
 * @property integer $id
 * @property string $name
 * @property string $info
 * @property string $password
 * @property integer $user
 *
 * The followings are the available model relations:
 * @property Users $user0
 */
class Info extends Models
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name,password', 'required','message'=>'Поле обязательно для заполнения'),
			array('user', 'numerical', 'integerOnly'=>true),
			array('name,login', 'length', 'max'=>50,'message'=>'Поле не может содержать более 50 знаков'),
			array('info, password,name,login', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, info', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user0' => array(self::BELONGS_TO, 'Users', 'user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя ресурса',
			'info' => 'Информация о ресурсе',
            'login' => 'Имя пользователя ресурса',
			'password' => 'Пароль от ресурса',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('name',$this->name,true);
		$criteria->compare('info',$this->info,true);
        $criteria->compare('login',$this->login,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Info the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
