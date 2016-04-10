<?php
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(0);
class LoginController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='//layouts/main';
	
	public function filters()
	{
		return array('accessControl');
	}

	public function accessRules()
	{
		return array(
			// array('allow',
			// 	'actions'=>array('index'),
			// 		'users'=>array('Yii::app()->user->checkAccess("administrador")')//
			// 		),
			array('allow',
				'actions'=>array('index'),
					'users'=>array('*') 
					),
			// array('deny',
			// 		'users'=>array('*'),
			// 	)
			);
	}

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$model=new LoginForm;

		//to set a redirect url and save 
		//$url=Yii::app()->getRequest()->getRequestUri();
		//Yii::app()->user->setReturnUrl($url);
		$returnUrl=Yii::app()->user->returnUrl;
		$returnUrl=$returnUrl!="/"?$returnUrl:"/panel";
		//Yii::app()->user->setState('iduser',null);

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			$model->rememberMe=$model->rememberMe=='on'?1:0;
			// $model->rememberMe=$_POST['LoginForm[3]']=='on'?1:0;
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				//$this->redirect('/panel');
				$this->redirect($returnUrl);
		}

		if (!Yii::app()->user->getState('iduser')) {
			Yii::app()->user->setState('iduser',null);
			$this->render('index');
		}
		else{
			// get the url saved and redirect
			$this->redirect($returnUrl);
			//$this->redirect('/panel');
		}

		
	}




}