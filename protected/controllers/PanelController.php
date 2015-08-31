<?php
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(0);
class PanelController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='//layouts/panel';
	
	public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }


	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','language','config','users','messages','pages','links','facebook'),
				'users'=>array('@')
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


	public function actionLanguage(){
		
		$model=Language::model()->findAll();


		$this->render('//language/admin',array(
			'model'=>$model,
		));
	}

	public function actionUsers(){
		
		$model=User::model()->findAll();


		$this->render('//user/admin',array(
			'model'=>$model,
		));
	}

	public function actionMessages(){
		
		$model=Form::model()->findAll();


		$this->render('message',array(
			'model'=>$model,
		));
	}
	public function actionPages(){
		
		$model=Page::model()->findAll();


		$this->render('//page/admin',array(
			'model'=>$model,
		));
	}

	public function actionLinks(){
		
		$model=Menu::model()->findAll();


		$this->render('//menu/admin',array(
			'model'=>$model,
		));
	}

	public function actionFacebook(){
		
		$model=Post::model()->findAll();


		$this->render('facebook',array(
			'model'=>$model,
		));
	}

	public function actionConfig(){
		
		$model=Configuration::model()->findByPk(1);

		if(isset($_POST['Configuration']))
		{	
			

			$model->attributes=$_POST['Configuration'];

			
			if($model->save()){	
				$new_name_logo = rand(1000,9999).time(); // rand(1000,9999) optional
				$new_name_logo = 'files/'.md5($new_name_logo).'.jpg'; //optional
				$model->logo=CUploadedFile::getInstance($model,'logo');
				if ( (is_object($model->logo) && get_class($model->logo)==='CUploadedFile')){
					$model->logo->saveAs($new_name_logo);
					$model->logo=$new_name_logo;
					$model->save();	
				}					
								
				$message="Successfully Updated";
				$this->redirect(array('config','message'=>$message));
			}
				
		}


		$this->render('//configuration/update',array(
			'model'=>$model,
		));
	}


        /**
        * This is the action to handle external exceptions.
        */
    // public function actionError(){

    // 	error_reporting(0);

        
    //     $this->render('/panel/index');
    // } 


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{	
		$this->layout='//layouts/panel';
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$this->render('index');
	}




}