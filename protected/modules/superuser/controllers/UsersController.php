<?php

class UsersController extends Controller
{
	public $layout='//layouts/column2';

    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
        $model=new Users();
		if(isset($_POST['Users']))
        {
            $model->attributes=$_POST['Users'];
            if($model->validate())
            {
                $model->password=$model->encryption($_POST['Users']['password']);
                if($model->save())
                {
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
        $model=$this->loadModel($id);
		if(isset($_POST['Users']))
		{
            $model->attributes=$_POST['Users'];
            if($model->validate())
            {
                $model->password=$model->encryption($_POST['Users']['password']);
                if($model->save())
                    $this->redirect(array('view','id'=>$model->id));
            }

		}

		$this->render('update',array(
			'model'=>$model
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function actionLogin()
    {
        $this->layout='//layouts/column1';
        $model=new LoginAdmin;
        if(isset($_POST['LoginAdmin']))
        {
            $model->attributes=$_POST['LoginAdmin'];
            if($model->validate() && $model->login())
                $this->redirect(array("users/index"));
        }
        $this->render('login',array('model'=>$model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function loadModel($id)
    {
        $model=Users::model()->findByPk($id);
        $model->password=Users::model()->decryption($model->password);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}
