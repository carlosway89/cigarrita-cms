<?php
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(0);
class PruebasController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='//site/test';
	
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
	public function actionError()
	{

		// if($error=Yii::app()->errorHandler->error)
		// {
		// 	if(Yii::app()->request->isAjaxRequest)
		// 		echo $error['message'];
		// 	else
		// 		$this->render('error');
		// }
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

		$this->render('/site/test');
	}




}