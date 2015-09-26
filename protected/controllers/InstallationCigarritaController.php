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
		
		// $is_instaled=Configuration::model()->findByPk(1)->is_installed;
		// if ($is_instaled) {
		// 	$this->redirect(array('/site/index'));
		// }else{
			// $this->layout='main';
			$this->render('//panel/installation');
			
		// }
		
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


	public function generatePHP($page){
		$root=$_SERVER['DOCUMENT_ROOT'];
		$html_dom=new HTMLDOM();

		$html=$html_dom->get($root."/themes/design/views/site/".$page.".php");
    	$html->find("html",0)->outertext='<?php include(Yii::app()->request->baseUrl."assets/init_config.php"); ?>'.$html->find("html",0)->outertext;
    	$html->save($root."/themes/design/views/site/".$page.".php");
    	$html->clear();

    	$html=$html_dom->get($root."/themes/design/views/site/".$page.".php");
    	$html->find("html",0)->setAttribute("ng-app","cigarritaWeb");
    	$html->save($root."/themes/design/views/site/".$page.".php");
    	$html->clear();
    	
    	$html=$html_dom->get($root."/themes/design/views/site/".$page.".php");
    	$html->find("body",0)->setAttribute("ng-controller","indexCtrl");
    	$html->save($root."/themes/design/views/site/".$page.".php");
    	$html->clear();


    	$html=$html_dom->get($root."/themes/design/views/site/".$page.".php");
    	foreach($html->find('link') as $key => $element){
			$element->href=Yii::app()->theme->baseUrl."/".$element->href;			
		}
		$html->save($root."/themes/design/views/site/".$page.".php");
		$html->clear();

		$html=$html_dom->get($root."/themes/design/views/site/".$page.".php");
    	foreach($html->find('script') as $key => $element){
    		if (!preg_match("/(http|https):\/\/(.*?)$/i", $element->src))
				$element->src=Yii::app()->theme->baseUrl."/".$element->src;			
		}
		$html->save($root."/themes/design/views/site/".$page.".php");
		$html->clear();
		
		$html=$html_dom->get($root."/themes/design/views/site/".$page.".php");
		foreach ($html->find('.header-options') as $element) {
			
			$element->children(1)->setAttribute('ng-href','{{link.url}}');
			$element->children(1)->setAttribute('ng-repeat','link in links');
			$element->children(1)->setAttribute('menu-links','{{link.type}}');
			$element->children(1)->innertext='{{link.name}}';

			$element->innertext=$element->children(1)->outertext;
			
			
		}
		$html->save($root."/themes/design/views/site/".$page.".php");
		$html->clear();

		$html=$html_dom->get($root."/themes/design/views/site/".$page.".php");

		foreach ($html->find('comment') as $value) {
			if ($value->outertext=='<!--content-->') {
				$value->parent()->setAttribute("ng-view","");
			}
		}
		
		$html->save($root."/themes/design/views/site/".$page.".php");
		$html->clear();

		if ($page!="index") {
    		$html=$html_dom->get($root."/themes/design/views/site/".$page.".php");
			$html->find('link',-1)->outertext=$html->find('link',-1)->outertext.'<?php include($request."assets/css_editor.php"); ?>';
			$html->save($root."/themes/design/views/site/".$page.".php");
	    	$html->clear();
    	}

		$html=$html_dom->get($root."/themes/design/views/site/".$page.".php");
		if ($page=="index") {
			$html->find('script',-1)->outertext=$html->find('script',-1)->outertext.'<?php include($request."assets/js_index.php"); ?>';
		
		}else{
			$html->find('script',-1)->outertext=$html->find('script',-1)->outertext.'<?php include($request."assets/js_editor.php"); ?>';
		
		}

		$html_page=$html->save();
    	$html->clear();

    	

    	$indent=new DINDENT();
    	$result=$indent->get($html_page);
		$file = new SplFileObject($root."/themes/design/views/site/".$page.".php",'w+');		            
        $file->fwrite($result);

        chmod($root."/themes/design/views/site/".$page.".php", 0777);
	}



	public function actionPages(){


		$dir = 'themes/design/';
		// $dir = 'themes/design/views/site/';

		$files=array();

		

		$root=$_SERVER['DOCUMENT_ROOT'];

		if (file_exists($dir."index.html") && file_exists($dir."blank.html")) {

	        foreach(glob($dir.'*.html') as $file) {
	          
	          if ($file!=$dir."index.html" && $file!=$dir."blank.html")
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
			}

	        if (isset($_POST['File'])) {
	        	
	        	$selected=$_POST['File'];

	        	foreach ($selected as $key => $value) {
	        		$single_file=$files[$key];

					$page=file_get_contents($root."/themes/design/$single_file");
	        		$name=str_replace(".html","", $single_file);
	        		$file = new SplFileObject($root."/themes/design/views/site/$name".".php",'w+');		            
			        $file->fwrite($page);

			        chmod($root."/themes/design/views/site/$name".".php", 0777);
			        $page=new Page();
			        $page->name=$name;
			        if ($page->save()) {
			        }
			        

	        	}

	        	$_files=array("blank.html"=>"index","index.html"=>"home");
	        	
	        	

	        	foreach ($_files as $key => $value) {
	        		$page=file_get_contents($root."/themes/design/$key");

	        		$file = new SplFileObject($root."/themes/design/views/site/$value".".php",'w+');		            
			        $file->fwrite($page);

			        chmod($root."/themes/design/views/site/$value".".php", 0777);

	        		if ($key=="blank.html") {
	        			$file = new SplFileObject($root."/themes/design/views/site/editor_cigarrita_worker".".php",'w+');		            
			        	$file->fwrite($page);

			        	$this->generatePHP("index");	
			        	$this->generatePHP("editor_cigarrita_worker");			        	
			        	
	        		}
	        		

	        	}

	        

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