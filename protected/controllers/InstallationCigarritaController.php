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
				'actions'=>array('index','pages','user'),
					// 'users'=>array('*') ,
					'expression'=>'!Configuration::model()->findByPk(1)->is_installed',
				),
			array('deny',  // deny all to users
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
		
		if (isset($_GET['language'])) {
			$model=Configuration::model()->findByPk(1);
			$model->language=$_GET['language'];
			$model->save();
		}

		if (isset($_POST['continue'])) {
			$this->redirect(array('pages'));
		}

		$this->render('//panel/installation');
		
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
			'users_groups'=>AuthItem::model()->findAll("name='admin'")
		));
	}


	public function generatePHP($page){
		$root=$_SERVER['DOCUMENT_ROOT'];
		$html_dom=new HTMLDOM();

		

    	$html=$html_dom->get($root."/themes/design/views/layout/".$page.".php");
    	$html->find("html",0)->setAttribute("ng-app","cigarritaWeb");
    	$html->save($root."/themes/design/views/layout/".$page.".php");
    	$html->clear();
    	
    	$html=$html_dom->get($root."/themes/design/views/layout/".$page.".php");
    	$html->find("body",0)->setAttribute("ng-controller","indexCtrl");
    	$html->save($root."/themes/design/views/layout/".$page.".php");
    	$html->clear();


    	$html=$html_dom->get($root."/themes/design/views/layout/".$page.".php");
    	foreach($html->find('link') as $key => $element){
			$element->href="/themes/design/".$element->href;			
		}
		$html->save($root."/themes/design/views/layout/".$page.".php");
		$html->clear();

		$html=$html_dom->get($root."/themes/design/views/layout/".$page.".php");
    	foreach($html->find('script') as $key => $element){
    		if (!preg_match("/(http|https):\/\/(.*?)$/i", $element->src))
				$element->src="/themes/design/".$element->src;	

		}

		$html->save($root."/themes/design/views/layout/".$page.".php");
		$html->clear();
		

		$html=$html_dom->get($root."/themes/design/views/layout/".$page.".php");

		foreach ($html->find('comment') as $value) {
			if ($value->outertext=='<!--content-->') {
				$value->parent()->setAttribute("ng-view","");
			}
		}
		
		$html_page=$html->save($root."/themes/design/views/layout/".$page.".php");
		$html->clear();

		

    	

    	$indent=new DINDENT();
    	$result=$indent->get($html_page);
		$file = new SplFileObject($root."/themes/design/views/layout/".$page.".php",'w+');		            
        $file->fwrite($result);

        chmod($root."/themes/design/views/layout/".$page.".php", 0777);

	}



	public function actionPages(){


		$dir = 'themes/design/';
		

		$files=array();

		

		$root=$_SERVER['DOCUMENT_ROOT'];

		if (file_exists($dir."index.html") && file_exists($dir."blank.html")) {

	        foreach(glob($dir.'*.html') as $file) {
	          
	            $files[]=str_replace($dir, "", $file);

	        }

	        if(!is_dir($dir."views")){
	        	$oldmask = umask(0);
	    		mkdir($dir."views",0777);
	    		umask($oldmask);
	    		if (!is_dir($dir."views/site")) {
	    			$oldmask = umask(0);
	    			mkdir($dir."views/site",0777);
	    			umask($oldmask);
	    		}
	    		if (!is_dir($dir."views/layout")) {
	    			$oldmask = umask(0);
	    			mkdir($dir."views/layout",0777);
	    			umask($oldmask);
	    		}
			}
			if(!is_dir($dir."modules")){
				$oldmask = umask(0);
	    		mkdir($dir."modules",0777);
	    		umask($oldmask);
			}

	        if (isset($_POST['File'])) {
	        	
	        	$selected=$_POST['File'];

	        	foreach ($selected as $key => $value) {
	        		$single_file=$files[$key];

					$page=file_get_contents($root."/themes/design/$single_file");
	        		$name=str_replace(".html","", $single_file);
	        		if ($name=='blank') {
						$file = new SplFileObject($root."/themes/design/views/layout/layout_standard.php",'w+');           
	        		}else{
	        			$file = new SplFileObject($root."/themes/design/views/site/$name".".php",'w+');		            
	        		}
	        		$file->fwrite($page);

	        		if ($name=='blank') {
	        			chmod($root."/themes/design/views/layout/layout_standard.php", 0777);				        
				    }else{
						chmod($root."/themes/design/views/site/$name".".php", 0777);
				    }

			        $page=new Page();
			        
			        if ($name=='blank') {
			        	$name="layout_standard";
			        	$page->layout=1;
			        }
			        $page->name=$name;
			        if ($page->save()) {
			        }
			        

	        	}

	        	$_files=array("blank.html"=>"layout_standard","index.html"=>"home");
	        	
	        	$this->generatePHP("layout_standard");
	        	

	        	// foreach ($_files as $key => $value) {
	        	// 	$page=file_get_contents($root."/themes/design/$key");

	        	// 	$file = new SplFileObject($root."/themes/design/views/site/$value".".php",'w+');		            
			       //  $file->fwrite($page);

			       //  chmod($root."/themes/design/views/site/$value".".php", 0777);

	        		
	        		

	        	// }

	        

	        	$this->redirect(array('user'));
	        }

			$this->render('//panel/page_list',array(
				'files'=>$files
			));
		}else{
			$this->redirect(array('/index'));
		}
	}




}