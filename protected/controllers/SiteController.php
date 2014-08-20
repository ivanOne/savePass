<?php

class SiteController extends Controller
{

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

    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Info',array(
            'criteria'=>array(
                'condition'=>'user='.Yii::app()->user->id.'',
            ),
            'pagination'=>array(
                'pageSize'=>5
            )
        ));
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

	public function actionLogin()
	{
		$model=new LoginForm;
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model=new Info;
        if(isset($_POST['Info']))
        {
            $model->attributes=$_POST['Info'];
            if($model->validate())
            {
                $model->password=$model->encryption($_POST['Info']['password']);
                $model->user=Yii::app()->user->id;
                $model->save();
                $this->redirect(array('view','id'=>$model->id));
            }

        }
        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
        if(isset($_POST['Info']))
        {
            $model->attributes=$_POST['Info'];
            if($model->validate())
            {
                $model->password=$model->encryption($_POST['Info']['password']);
                $model->save();
                $this->redirect(array('view','id'=>$model->id));
            }

        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();
    }
    public function loadModel($id)
    {
        $model=Info::model()->findByPk($id,'user=:user',array(':user'=>Yii::app()->user->id));
        if($model===null)
            throw new CHttpException(404,'Страница отсутстыует либо недоступна.');
        else
        {
            $model->password=Info::model()->decryption($model->password);
            return $model;
        }
    }
}