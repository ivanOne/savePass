<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'controllers'=>array('site','superuser/users'),
                'actions'=>array('login','error'),
                'users'=>array('*'),
            ),
            array('allow',
                'controllers'=>array('site'),
                'actions'=>array('index','view','create','delete','update','logout'),
                'users'=>array('@'),
            ),
            array('allow',
                'controllers'=>array('superuser/users'),
                'actions'=>array('view','admin','delete','index','create','update','logout'),
                'users'=>array(Yii::app()->getModule('superuser')->login),
            ),
            array('denny',
                'users'=>array('*')
            )

        );
    }
}