<?php
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(0);
class MailController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	// public $layout='//layouts/panel';
	
	public function filters()
	{
		return array('accessControl');
	}

	//SI USAS ACCESS RULES DEBES ESPECIFICAR TODAS TUS ACCIONES, ES COMO TENER UNA FLACA
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index'),
				'users'=>array('*')
					// 'users'=>array('Yii::app()->user->checkAccess("administrador")')
					),
			// array('allow',
			// 	'actions'=>array('index'),
			// 		'users'=>array('*') 
			// 		),
			array('deny',
					'users'=>array('*'),
				)
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
		// $this->layout='//layouts/panel';
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->render('index');
		$this->redirect('http://webmail1.hostinger.co/roundcube/');
	}




}