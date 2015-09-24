<?php
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(0);
class InstallationCigarritaController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='main';
	
	public function filters()
	{
		return array('accessControl');
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','pages'),
					'users'=>array('*') 
					),
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
			$this->redirect(array('/site/index'));
		}else{
			$this->layout='main';
			$this->render('//panel/installation');
			
		}
		
		if (isset($_POST['continue'])) {
			$this->redirect(array('pages'));
		}
		
	}


	public function actionUser(){
		
		$model=new User();


		if(isset($_POST['User']))
		{	
			
			$model->attributes=$_POST['User'];
			$model->estado=1;		

			$model->password=md5($model->password);

			
			if($model->save()){									
				$auth=new AuthAssignment();
				$auth->itemname="admin";
				$auth->userid=$model->username;
				$auth->iduser=$model->iduser;

				
				if ($auth->save()) {
					$conf=Configuration::model()->findByPk(1);
					$conf->is_installed=1;
					if ($conf->save()) {
						$this->redirect(array('/login'));
					}
				}

			}
				
		}
		

		$this->render("//panel/first_user",array(
			'model'=>$model,
		));
	}


	public function actionPages(){


		$dir = 'themes/design/views/site/';

		$files=array();

		

		$root=$_SERVER['DOCUMENT_ROOT'];


        foreach(glob($dir.'*.html') as $file) {
          
          if ($file!=$dir."index.html")
          	$files[]=str_replace($dir, "", $file);

        }

        if (isset($_POST['File'])) {
        	
        	$selected=$_POST['File'];

        	foreach ($selected as $key => $value) {
        		$single_file=$files[$key];

				$page=file_get_contents($root."/themes/design/views/site/$single_file");
        		$name=str_replace(".html","", $single_file);
        		$file = new SplFileObject($root."/themes/design/views/site/$name".".php",'w+');		            
		        $file->fwrite($page);

		        $page=new Page();
		        $page->name=$name;
		        if ($page->save()) {
		        	

		        }
		        

        	}

        	// $this->refresh();

        	$this->redirect(array('user'));
        }

		$this->render('//panel/page_list',array(
			'files'=>$files
		));
	}




}