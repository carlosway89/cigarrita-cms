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
            // 'postOnly + delete', // we only allow deletion via POST request
        );
    }


	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','language','config','users','messages','pages','posts','links','facebook','delete'),
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

	public function uri($i){

        // $url=Yii::app()->request->url;
        $url=Yii::app()->request->getPathInfo();
        $uri = explode("/", $url);

        return isset($uri[$i])?$uri[$i]:false;
    }


	public function actionLanguage(){
		
		$model=Language::model()->findAll();


		$this->render('//language/admin',array(
			'model'=>$model,
		));
	}

	public function actionUsers($id=null){
		
		$model=new User();
		$message=null;
		$list=null;
		$criteria = new CDbCriteria;

		if ($id!=null) {
			$model=User::model()->findByPk($id);
			$render='//user/update';

		}

		if(isset($_POST['User']))
		{	
			
			$pass=$model->password;
			$model->attributes=$_POST['User'];
			$model->estado=$model->estado=='on'?1:0;
			
			

			$model->password=$pass==$model->password?$model->password:md5($model->password);

			
			if($model->save()){									
				$message="Successfully Updated";
				
			}
				
		}
		if ($id==null) {
			$criteria->with=array('auth');
			if (!Yii::app()->user->checkAccess("webmaster")) {
				$criteria->condition="is_deleted='0' and auth.itemname!='webmaster'";
			}else{
				$criteria->condition="is_deleted='0'";
			}
			
        	$criteria->together = true; 

			$list=User::model()->findAll($criteria);
			$render='//user/admin';
		}

		
		

		

		$this->render($render,array(
			'model'=>$model,
			'message'=>$message,
			'list'=>$list,

		));
	}

	public function actionMessages($id=null){


		if ($id==null) {
			$model=Form::model()->findAll("is_deleted='0'");	

			$this->render('message',array(
				'model'=>$model,
			));
			
		}else{
			$model=Form::model()->findByPk($id);

			if ($model->state=="new") {
				$model->state="seen";
				$model->save();
			}
			

			$this->render('message_single',array(
				'model'=>$model,
			));
		}
		
		


		
	}
	public function actionPosts(){

		$lang=$this->uri(2)?$this->uri(2):Yii::app()->user->getState('language_initial');

		$language=Language::model()->findAll("estado=1");

		$category=Category::model()->findAll();

		$model=new Post();

		$message=null;
		$list=null;

		
		if (is_numeric($lang)) {
			$id=$lang;

			$model=Post::model()->findByPk($id);

			$render='//post/update';

		}
		if(isset($_POST['Post']))
		{	
			
			$model->attributes=$_POST['Post'];
			$model->state=$model->state=='on'?1:0;

			
			if($model->save()){									
				$message="Successfully Updated";
				
			}
				
		}
		if (!is_numeric($lang)){
			
			$list=Post::model()->findAll("is_deleted='0' AND language = '".$lang."'");
			$render='//post/admin';
			
		}

		$this->render($render,array(
			'list'=>$list,
			'model'=>$model,
			'message'=>$message,
			'category'=>$category,
			'language'=>$language,
		));
		
		


		
	}
	public function actionPages(){
		
		$model=Page::model()->findAll();


		$this->render('//page/admin',array(
			'model'=>$model,
		));
	}

	public function actionLinks(){
		
		$lang=$this->uri(2)?$this->uri(2):Yii::app()->user->getState('language_initial');
		
		$language=Language::model()->findAll("estado=1");

		$page=Page::model()->findAll("state=1");
		$block=Block::model()->findAll("state=1");
		
		$model=new Menu();

		$message=null;
		$list=null;

		

		if (is_numeric($lang)) {
			$id=$lang;

			$model=Menu::model()->findByPk($id);

			$render='//menu/menu';

		}

		if(isset($_POST['Menu']))
		{	
			
			$model->attributes=$_POST['Menu'];
			$model->state=$model->state=='on'?1:0;

			
			if($model->save()){									
				$message="Successfully Updated";
				
			}
				
		}

		if (!is_numeric($lang)){
			
			$list=Menu::model()->findAll("is_deleted='0' AND language = '".$lang."'");
			$render='//menu/admin';
			
		}

		

		$this->render($render,array(
				'model'=>$model,
				'page'=>$page,
				'block'=>$block,
				'language'=>$language,
				'message'=>$message,
				'list'=>$list,
				'lang'=>!is_numeric($lang)?$lang:'es'
		));

	}

	public function actionDelete(){
		
		$_model=$this->uri(2);
		$id=$this->uri(3);


		$model=ucfirst($_model);

		$model=$model::model()->findByPk($id);

		$model->is_deleted=1;

		
		if($model->save()){						
			switch ($_model) {
				case 'menu':
					$link='links';
					break;
				case 'user':
					$link='users';
					break;
				case 'form':
					$link='messages';
					break;
				case 'post':
					$link='posts';
					break;				
				default:
					$link=$_model;
					break;
			}

			$this->redirect(array('//panel/'.$link.'/'));
		}else{
			print_r($model->errors);
		}
			

		
        
	}


	public function actionFacebook(){
		


		$model_about=Post::model()->findAll("category='fb_about'");
		$model_feed=Post::model()->findAll("category='fb_feed'");
		$model_contact=Post::model()->findAll("category='fb_contact'");
		$model_events=Post::model()->findAll("category='fb_events'");
		$model_gallery=Post::model()->findAll("category='fb_gallery'");


		$this->render('facebook',array(
			'model_about'=>$model_about,
			'model_feeds'=>$model_about,
			'model_contact'=>$model_about,
			'model_events'=>$model_about,
			'model_gallery'=>$model_gallery
		));
	}

	public function actionConfig(){
		
		$model=Configuration::model()->findByPk(1);

		$language=Language::model()->findAll("estado=1");

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
			'language'=>$language
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