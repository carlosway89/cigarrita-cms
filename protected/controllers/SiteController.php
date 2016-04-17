<?php
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(0);
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='//site/index';
	public $editor=false;
	public $modules=array();
	public $seo=array();

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
	public function actionIndex($editor=false)
	{
		
		try {
			error_reporting(0);
			http_response_code(200);

			$is_instaled=Configuration::model()->findByPk(1)->is_installed;
			if ($is_instaled) {
				if (Yii::app()->user->id) {
					$this->editor=$editor;
				}else{
					$this->editor=false;
				}
				$this->layout="//layouts/web";				
				$this->render('index',array("modules"=>$this->get_modules(),"seo"=>Configuration::model()->find(),"editor"=>$this->editor));	
			}else{
				$this->redirect(array('/installationCigarrita'));
			}
		} catch (Exception $e) {
			//print_r($e);
			header("Location: /install");
		}
		
		
	}
	public function render_page($type,$template){

		
        return preg_replace("/[\r\n]*/","",$this->renderPartial("//$type/$template",array("modules"=>$this->get_modules()),true));
 		
    }
    public function get_modules($extra=null){
    	
    	$modules=array();

    	$core=array(
				"Language"=>Language::model(),
				"Post"=>Post::model(),
				"Menu"=>Menu::model(),
				"Block"=>Block::model(),
				"Category"=>Category::model(),
				"Page"=>Page::model(),
				"extra"=>$extra,
				"editor"=>$this->editor,
				"login"=>Yii::app()->user->id
			);
    	

		$root=$_SERVER['DOCUMENT_ROOT'];

		$_modules=Modules::model()->findAll("is_deleted='0'");
		foreach ( $_modules as $mod_val) {
			$modules[$mod_val->name] = $this->renderInternal($root."/assets/modules/".$mod_val->name."/php/".$mod_val->name.".php",$core,true);
		}
    	


    	return $modules;
    }
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{

		try {
			error_reporting(0);
			http_response_code(200);

			$is_instaled=Configuration::model()->findByPk(1)->is_installed;
			if ($is_instaled) {
				$this->layout="//layouts/web";				
				$this->render('index',array("modules"=>$this->get_modules(),"seo"=>Configuration::model()->find(),"editor"=>$this->editor));	
			}else{
				$this->redirect(array('/installationCigarrita'));
			}
		} catch (Exception $e) {
			//print_r($e);
			header("Location: /install");
		}
		
		
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