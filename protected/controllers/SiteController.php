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

				$this->render('//layout/layout_standard',array("modules"=>$this->get_modules(),"seo"=>Configuration::model()->find(),"editor"=>$this->editor));	
			}else{
				$this->redirect(array('/installationCigarrita'));
			}
		} catch (Exception $e) {
			
			if ($e->getCode()=="1049" || $e->getCode()=="0" || $e->getCode()=="1045" || $e->getCode()=="2005" ) {
				header("Location: /install");
			}else{
				$root=$_SERVER['DOCUMENT_ROOT'];
				$date=date("Y-m-d");
				$msg="";
				$file = new SplFileObject($root."/protected/runtime/cigarrita.log-".$date,'w+');
				while (!$file->eof()) {
				   $msg=$file->fgets()."\n".$msg;
				}	
				$msg=$msg."\n".$date.": ".$e->getMessage();	            
	            $file->fwrite($msg); 

	           
			}
		
		}
		
		
	}
	public function render_page($type,$template){

		$_template=$this->renderPartial("//$type/$template",array("modules"=>$this->get_modules()),true);
        $_template=$data=str_replace(array("'"),array("\'"),$_template);
        $_template=preg_replace("/[\r\n]*/","",$_template);

        return $_template;
 		
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

		$_modules=Modules::model()->findAll("is_deleted='0' and state='1'");
		foreach ( $_modules as $mod_val) {
			$modules[$mod_val->name] = $this->renderInternal($root."/themes/".Yii::app()->theme->name."/modules/".$mod_val->name."/php/".$mod_val->name.".php",$core,true);
		}
    	


    	return $modules;
    }
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{	

		if (! YII_DEBUG ) {
		
			try {
				error_reporting(0);
				http_response_code(200);

				$is_instaled=Configuration::model()->findByPk(1)->is_installed;
				if ($is_instaled) {
					$this->layout="//layouts/web";	
					
					$url=Yii::app()->request->getPathInfo();
        			$uri = explode("/", $url);
					$menu=Menu::model()->find("url='/".$uri[0]."'");
					
					if($menu){
						$seo=(object)["title"=>$menu->SEO_title,"description"=>$menu->SEO_description,"language"=>$menu->language,"keywords"=>$menu->SEO_keywords];
					}else{
						$seo=Configuration::model()->find();
					}

					$this->render('//layout/layout_standard',array("modules"=>$this->get_modules(),"seo"=>$seo,"editor"=>$this->editor));	
				}else{
					$this->redirect(array('/installationCigarrita'));
				}
			} catch (Exception $e) {
				if ($e->getCode()=="1049" || $e->getCode()=="0" || $e->getCode()=="1045" || $e->getCode()=="2005" ) {
					header("Location: /install");
				}else{
					$root=$_SERVER['DOCUMENT_ROOT'];
					$date=date("Y-m-d");
					$msg="";
					$file = new SplFileObject($root."/protected/runtime/cigarrita.log-".$date,'w+');
					while (!$file->eof()) {
					   $msg=$file->fgets()."\n".$msg;
					}	
					$msg=$msg."\n".$date.": ".$e->getMessage();	            
		            $file->fwrite($msg); 

				}
			}
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