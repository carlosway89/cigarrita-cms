<?php
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(0);
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='//site/index';
	
	public function filters()
	{
		return array('accessControl');
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('panel','logout'),
					// 'users'=>array('Yii::app()->user->checkAccess("administrador")')
					'users'=>array('@')
					),
			array('allow',
				'actions'=>array('index','login','logout'),
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
		
		$is_instaled=Configuration::model()->findByPk(1)->is_installed;
		if ($is_instaled) {
			$this->render('index');
		}else{
			$this->layout='main';
			$this->render('//panel/installation');
			echo 'instalation....';
		}
		
		
		
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		// $this->layout='//layouts/main';

		// if($error=Yii::app()->errorHandler->error)
		// {
		// 	if(Yii::app()->request->isAjaxRequest)
		// 		echo $error['message'];
		// 	else
		// 		$this->render('error');
		// }
		error_reporting(0);
		$this->render('index');
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		// display the login form
		$this->redirect(array('/login'));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		Yii::app()->user->setState('iduser',null);
		// $this->redirect(Yii::app()->homeUrl);
		$this->redirect('login/');
	}
}