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
				'actions'=>array('index','language','config','users','messages','pages','posts','links','facebook','delete','change','help'),
				'users'=>array('@')
					// 'users'=>array('Yii::app()->user->checkAccess("administrador")')
					),
			// array('allow',
			// 	'actions'=>array('facebook'),
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

    public function flags(){

        
        $dir=$_SERVER['DOCUMENT_ROOT'].'/assets/editor/flags/4x3';

        $files = scandir($dir);
        $rows = array();

        $country=array("ad"=>"Andorra",
          "ae"=>"United Arab Emirates",
          "af"=>"Afghanistan",
          "ag"=>"Antigua",
          "ai"=>"Anguilla",
          "al"=>"Albania",
          "am"=>"Armenia",
          "an"=>"Netherlands Antilles",
          "ao"=>"Angola",
          "ar"=>"Argentina",
          "as"=>"American Samoa",
          "at"=>"Austria",
          "au"=>"Australia",
          "aw"=>"Aruba",
          "ax"=>"Aland Islands",
          "az"=>"Azerbaijan",
          "ba"=>"Bosnia",
          "bb"=>"Barbados",
          "bd"=>"Bangladesh",
          "be"=>"Belgium",
          "bf"=>"Burkina Faso",
          "bg"=>"Bulgaria",
          "bh"=>"Bahrain",
          "bi"=>"Burundi",
          "bj"=>"Benin",
          "bm"=>"Bermuda",
          "bn"=>"Brunei",
          "bo"=>"Bolivia",
          "br"=>"Brazil",
          "bs"=>"Bahamas",
          "bt"=>"Bhutan",
          "bv"=>"Bouvet Island",
          "bw"=>"Botswana",
          "by"=>"Belarus",
          "bz"=>"Belize",
          "ca"=>"Canada",
          "cc"=>"Cocos Islands",
          "cd"=>"Congo",
          "cf"=>"Central African Republic",
          "cg"=>"Congo Brazzaville",
          "ch"=>"Switzerland",
          "ci"=>"Cote lioire",
          "ck"=>"Cook Islands",
          "cl"=>"Chile",
          "cm"=>"Cameroon",
          "cn"=>"China",
          "co"=>"Colombia",
          "cr"=>"Costa Rica",
          "cs"=>"Serbia",
          "cu"=>"Cuba",
          "cv"=>"Cape Verde",
          "cx"=>"Christmas Island",
          "cy"=>"Cyprus",
          "cz"=>"Czech Republic",
          "de"=>"Germany",
          "dj"=>"Djibouti",
          "dk"=>"Denmark",
          "dm"=>"Dominica",
          "do"=>"Dominican Republic",
          "dz"=>"Algeria",
          "ec"=>"Ecuador",
          "ee"=>"Estonia",
          "eg"=>"Egypt",
          "eh"=>"Western Sahara",
          "er"=>"Eritrea",
          "es"=>"Spain",
          "et"=>"Ethiopia",
          "eu"=>"European Union",
          "fi"=>"Finland",
          "fj"=>"Fiji",
          "fk"=>"Falkland Islands",
          "fm"=>"Micronesia",
          "fo"=>"Faroe Islands",
          "fr"=>"France",
          "ga"=>"Gabon",
          "gb"=>"England",
          "gd"=>"Grenada",
          "ge"=>"Georgia",
          "gf"=>"French Guiana",
          "gh"=>"Ghana",
          "gi"=>"Gibraltar",
          "gl"=>"Greenland",
          "gm"=>"Gambia",
          "gn"=>"Guinea",
          "gp"=>"Guadeloupe",
          "gq"=>"Equatorial Guinea",
          "gr"=>"Greece",
          "gs"=>"Sandwich Islands",
          "gt"=>"Guatemala",
          "gu"=>"Guam",
          "gw"=>"Guinea-Bissau",
          "gy"=>"Guyana",
          "hk"=>"Hong Kong",
          "hm"=>"Heard Island",
          "hn"=>"Honduras",
          "hr"=>"Croatia",
          "ht"=>"Haiti",
          "hu"=>"Hungary",
          "id"=>"Indonesia",
          "ie"=>"Ireland",
          "il"=>"Israel",
          "in"=>"India",
          "io"=>"Indian Ocean Territory",
          "iq"=>"Iraq",
          "ir"=>"Iran",
          "is"=>"Iceland",
          "it"=>"Italy",
          "jm"=>"Jamaica",
          "jo"=>"Jordan",
          "jp"=>"Japan",
          "ke"=>"Kenya",
          "kg"=>"Kyrgyzstan",
          "kh"=>"Cambodia",
          "ki"=>"Kiribati",
          "km"=>"Comoros",
          "kn"=>"Saint Kitts and Nevis",
          "kp"=>"North Korea",
          "kr"=>"South Korea",
          "kw"=>"Kuwait",
          "ky"=>"Cayman Islands",
          "kz"=>"Kazakhstan",
          "la"=>"Laos",
          "lb"=>"Lebanon",
          "lc"=>"Saint Lucia",
          "li"=>"Liechtenstein",
          "lk"=>"Sri Lanka",
          "lr"=>"Liberia",
          "ls"=>"Lesotho",
          "lt"=>"Lithuania",
          "lu"=>"Luxembourg",
          "lv"=>"Latvia",
          "ly"=>"Libya",
          "ma"=>"Morocco",
          "mc"=>"Monaco",
          "md"=>"Moldova",
          "me"=>"Montenegro",
          "mg"=>"Madagascar",
          "mh"=>"Marshall Islands",
          "mk"=>"MacEdonia",
          "ml"=>"Mali",
          "ar"=>"Burma",
          "mn"=>"Mongolia",
          "mo"=>"MacAu",
          "mp"=>"Northern Mariana Islands",
          "mq"=>"Martinique",
          "mr"=>"Mauritania",
          "ms"=>"Montserrat",
          "mt"=>"Malta",
          "mu"=>"Mauritius",
          "mv"=>"Mallies",
          "mw"=>"Malawi",
          "mx"=>"Mexico",
          "my"=>"Malaysia",
          "mz"=>"Mozambique",
          "na"=>"Namibia",
          "nc"=>"New Caledonia",
          "ne"=>"Niger",
          "nf"=>"Norfolk Island",
          "ng"=>"Nigeria",
          "ni"=>"Nicaragua",
          "nl"=>"Netherlands",
          "no"=>"Norway",
          "np"=>"Nepal",
          "nr"=>"Nauru",
          "nu"=>"Niue",
          "nz"=>"New Zealand",
          "om"=>"Oman",
          "pa"=>"Panama",
          "pe"=>"Peru",
          "pf"=>"French Polynesia",
          "pg"=>"New Guinea",
          "ph"=>"Philippines",
          "pk"=>"Pakistan",
          "pl"=>"Poland",
          "pm"=>"Saint Pierre",
          "pn"=>"Pitcairn Islands",
          "pr"=>"Puerto Rico",
          "ps"=>"Palestine",
          "pt"=>"Portugal",
          "pw"=>"Palau",
          "py"=>"Paraguay",
          "qa"=>"Qatar",
          "re"=>"Reunion",
          "ro"=>"Romania",
          "rs"=>"Serbia",
          "ru"=>"Russia",
          "rw"=>"Rwanda",
          "sa"=>"Saudi Arabia",
          "sb"=>"Solomon Islands",
          "sc"=>"Seychelles",
          "sd"=>"Sudan",
          "se"=>"Sweden",
          "sg"=>"Singapore",
          "sh"=>"Saint Helena",
          "si"=>"Slovenia",
          "sj"=>"Svalbard, I flag Jan Mayen",
          "sk"=>"Slovakia",
          "sl"=>"Sierra Leone",
          "sm"=>"San Marino",
          "sn"=>"Senegal",
          "so"=>"Somalia",
          "sr"=>"Suriname",
          "st"=>"Sao Tome",
          "sv"=>"El Salvador",
          "sy"=>"Syria",
          "sz"=>"Swaziland",
          "tc"=>"Caicos Islands",
          "td"=>"Chad",
          "tf"=>"French Territories",
          "tg"=>"Togo",
          "th"=>"Thailand",
          "tj"=>"Tajikistan",
          "tk"=>"Tokelau",
          "tl"=>"Timorleste",
          "tm"=>"Turkmenistan",
          "tn"=>"Tunisia",
          "to"=>"Tonga",
          "tr"=>"Turkey",
          "tt"=>"Trinidad",
          "tv"=>"Tuvalu",
          "tw"=>"Taiwan",
          "tz"=>"Tanzania",
          "ua"=>"Ukraine",
          "ug"=>"Uganda",
          "um"=>"Us Minor Islands",
          "us"=>"United States",
          "uy"=>"Uruguay",
          "uz"=>"Uzbekistan",
          "va"=>"Vatican City",
          "vc"=>"Saint Vincent",
          "ve"=>"Venezuela",
          "vg"=>"British Virgin Islands",
          "vi"=>"Us Virgin Islands",
          "vn"=>"Vietnam",
          "vu"=>"Vanuatu",
          "wf"=>"Wallis and Futuna",
          "ws"=>"Samoa",
          "ye"=>"Yemen",
          "yt"=>"Mayotte",
          "za"=>"South Africa",
          "zm"=>"Zambia",
          "zw"=>"Zimbabwe");

        foreach ($files as $key => $value) {
            if ( $value!="." && $value!="..") {
                // $rows[] = 'value';
               $value=str_replace('.svg', '', $value);
               $rows[] = ['name'=>$value,'flag'=>$country[$value]];
            }
            
        }                 

        return $rows;
        // $this->_sendResponse(200, CJSON::encode($rows));

    }

	public function actionLanguage($id=null){
		
		
		$list=null;
		
		$message=null;
		$model=new Language();
		
		$flags=$this->flags();

		if (is_numeric($id)) {

			$model=Language::model()->findByPk($id);

			$render='//language/update';

		}

		if(isset($_POST['Language']))
		{	
			
			$model->attributes=$_POST['Language'];
			$model->estado=$model->estado=='on'?1:0;
			$model->min=$model->flag;

			
			
			if ($model->isNewRecord) {
				if($model->save()){	
					$_block=Block::model()->findAll("language='".Yii::app()->user->getState('language_initial')."'");
					$_menu=Menu::model()->findAll("language='".Yii::app()->user->getState('language_initial')."'");

					foreach ($_block as  $value) {
						$model_block=new Block();
						$model_block->attributes=$value->attributes;
						unset($model_block->idblock);
						$model_block->language=$model->flag;

						if ($model_block->save()) {
							foreach ($value->pageHasBlocks as $val_page) {
								$model_page_block=new PageHasBlock();
								$model_page_block->block_idblock=$model_block->idblock; 
								$model_page_block->page_idpage=$val_page->page_idpage;
								if ($model_page_block->save()) {
									$message="Successfully Updated";
								}
							}
						}
						
					}	

					foreach ($_menu as $menu_val) {
						$model_menu=new Menu();
						$model_menu->attributes=$menu_val->attributes;
						unset($model_menu->idmenu);
						$model_menu->language=$model->flag;

						if ($model_menu->save()) {
							$message="Successfully Updated";
						}

					}

				}
			}else{
				if($model->save()){
					$message="Successfully Updated";
				}
			}
			
				
		}

		if (!is_numeric($id)) {

			$list=Language::model()->findAll("is_deleted='0'");

			$render='//language/admin';

		}


		
		$this->render($render,array(
			'model'=>$model,
			'list'=>$list,
			'flags'=>$flags,
			'message'=>$message
		));
	}

	public function actionChange($id=null){

		$model=Language::model()->findByPk($id);

		if (isset($_POST['estado'])) {
			$model->estado=$_POST['estado'];
			$model->save();
		}


	}
	public function actionHelp(){

		$this->render("//panel/help");

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

		$language=Language::model()->findAll("estado=1 AND is_deleted='0'");

		$category=Category::model()->findAll();

		$model=new Post();

		$attr=array(0=>array("key"=>"","value"=>"","idattributes"=>"0","idpost"=>"0"));

		$message=null;
		$list=null;

		
		if (is_numeric($lang)) {
			$id=$lang;

			$model=Post::model()->findByPk($id);


			foreach ($model->attributes0 as $has_attr) { 

                $attr[]=$has_attr->Attributes;                                           

            }
			

			$render='//post/update';

		}
		if(isset($_POST['Post']))
		{	
			
			$model->attributes=$_POST['Post'];
			$model->state=$model->state=='on'?1:0;

			
			if($model->save()){				
				if (isset($_POST['Attr'])) {
					$new_attr=$_POST['Attr'];

					
					// print_r($new_attr);
					for ($i=0; $i < count($new_attr['idattributes']); $i++) { 
						$idattributes=$new_attr['idattributes'][$i];
						$idpost=$new_attr['idpost'][$i];
						$key=$new_attr['key'][$i];
						$value=$new_attr['value'][$i];

						if ( $idattributes!=0) {
							$_attributes=Attributes::model()->findByPk($idattributes);
							$_attributes->idpost=$idpost;
						}else{
							$_attributes=new Attributes();
							$_attributes->idpost=$model->idpost;
						}

						$_attributes->key=$key;
						$_attributes->value=$value;

						if ($value!="" && $key!="") {
							if ($_attributes->save()) {
								
							}
						}
						

					}

					$model=Post::model()->findByPk($model->idpost);

					$attr=array(0=>array("key"=>"","value"=>"","idattributes"=>"0","idpost"=>"0"));

					foreach ($model->attributes0 as $has_attr) { 

		                $attr[]=$has_attr->Attributes;                                           

		            }

					
				}		

				$message="Successfully Updated";
				
			}
				
		}
		if (!is_numeric($lang)){
			
			$list=Post::model()->findAll("is_deleted='0' AND language = '".$lang."' AND category!='fb_about' AND category!='fb_feed' AND category!='fb_event' AND category!='fb_gallery' AND category!='fb_contact' ");
			$render='//post/admin';
			
		}

		$this->render($render,array(
			'list'=>$list,
			'model'=>$model,
			'message'=>$message,
			'category'=>$category,
			'language'=>$language,
			'attr'=>$attr
		));
		
		


		
	}
	public function actionPages($id=null){
		
		
		$model=new Page();

		$model_block=new Block();

		$model_category=new Category();

		$list_category=Category::model()->findAll();

		$message=null;
		$list=null;

		$root=$_SERVER['DOCUMENT_ROOT'];

		if (Yii::app()->user->checkAccess("webmaster")) {
			

			if (is_numeric($id)) {

				$model=Page::model()->findByPk($id);
				
				
				$source=file_get_contents($root."/themes/design/views/site/$model->name".".php");
				// $file = new SplFileObject($root.'/themes/design/views/site/home'.'.php','w+');

				$model->source=$source;

				$render='//page/update';

			}

			if(isset($_POST['Page']))
			{	
				
				$model->attributes=$_POST['Page'];
				$model->state=$model->state=='on'?1:0;
				$page=$model->source;
				$model->source="";
				
				if($model->save()){									
					$message="Successfully Updated";
					
					
					$file = new SplFileObject($root."/themes/design/views/site/$model->name".".php",'w+');		            
		            $file->fwrite($page); 

		            $source=file_get_contents($root."/themes/design/views/site/$model->name".".php");

					$model->source=$source;

					$this->refresh();
				}
					
			}

			if(isset($_POST['Category']))
			{	
				
				$model_category->attributes=$_POST['Category'];

				
				if($model_category->save()){									
					$message="Successfully Updated";
					$list_category=Category::model()->findAll();
				}
					
			}

			if(isset($_POST['Block']))
			{	
				$_lang=Language::model()->findAll("is_deleted='0'");

				foreach ($_lang as $value) {					
				
					$model_block=new Block();
					$model_block->attributes=$_POST['Block'];
					$model_block->language=$value->flag;
					if ($model_block->isNewRecord) {
						$model_block->state=1;
					}else{
						$model_block->state=$model->state=='on'?1:0;
					}				
					
					if($model_block->save()){
						$page_has_block=new PageHasBlock();
						$page_has_block->page_idpage=$_POST['page_id'];
						$page_has_block->block_idblock=$model_block->idblock;
						if ($page_has_block->save()) {
							$message="Successfully Updated";
						}
						
					}
				}
					
			}
		}
		else{
			// $list=Page::model()->findAll("is_deleted='0'");
			$render='//page/admin';
			// $this->redirect(array('panel/pages'));
		}

		if (!is_numeric($id)){
			
			$list=Page::model()->findAll("is_deleted='0'");
			$render='//page/admin';
			
		}

		$this->render($render,array(
			'list'=>$list,
			'list_category'=>$list_category,
			'lang'=>Yii::app()->user->getState('language_initial'),
			'model'=>$model,
			'model_block'=>$model_block,
			'model_category'=>$model_category,
			'message'=>$message,
		));

		
	}

	public function actionLinks(){
		
		$lang=$this->uri(2)?$this->uri(2):Yii::app()->user->getState('language_initial');
		
		$language=Language::model()->findAll("estado=1 AND is_deleted='0'");

		$page=Page::model()->findAll("state=1 AND is_deleted='0'");
		$block=Block::model()->findAll("state=1 AND is_deleted='0'");
		
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
			

			if ($model->isNewRecord) {
				
				$_lang=Language::model()->findAll("is_deleted='0'");

				foreach ($_lang as $value) {					
					$model=new Menu();
					$model->attributes=$_POST['Menu'];
					$model->state=$model->state=='on'?1:0;					
					$model->language=$value->flag;

					if ($model->save()) {
						$message="Successfully Updated";
					}				
					
				}
			}else{
				$model->attributes=$_POST['Menu'];
				$model->state=$model->state=='on'?1:0;
				
				if($model->save()){									
					$message="Successfully Updated";					
				}
			}					
			
				
		}


		if (!is_numeric($lang)){
			
			$list=Menu::model()->findAll("is_deleted='0' AND language = '".$lang."' order by t.position");
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
				case 'page':
					$link='pages';
					break;	
				case 'block':
					$link='pages';
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

	private function saveFBdata($response,$type_sync){
        


        $id=$response['id'];
        
        $cat=Category::model()->findByAttributes(array('category'=>"fb_".$type_sync));

        

        if (!$cat) {
            $cat_model=new Category();
            $cat_model->category="fb_".$type_sync;
            $cat_model->save();
        }

        $continue=true;

        switch ($type_sync) {
        	case 'feed':
        		$data_response=$response['posts']->data;
        		break;
        	case 'event':
        		$data_response=$response['events']->data;
        		break;  
        	case 'gallery':
        		$data_response=$response['photos']->data;
        		break;       	
        	default:
        		$continue=false;
        		$data_response=$response;
        		break;
        }


    	if (!$continue) {
    		$post=Post::model()->findByAttributes(array('source'=>$id)); 
    		if ($post) {
    			$_model=$post;
    			$id_post=$_model->idpost;
    		}else{
    			$_model=new Post();
    			$_model->language=Yii::app()->user->getState('language_initial');
	            $_model->source=$id;
	            $_model->category="fb_".$type_sync;

	            if ($_model->save()) {
	            	$id_post=$_model->idpost;
	            }
    		}
    		
    	}
              

        foreach($data_response as $key_data=>$data) {

        	
        	if ($continue) {

        		$post=Post::model()->findByAttributes(array('source'=>$data->id));

        		if ($post) {
        		 	$_model=$post;
        			$id_post=$_model->idpost;
        		}else{

	        		$_model=new Post();
	        		$_model->source=$data->id;
	        		$_model->language=Yii::app()->user->getState('language_initial');
		  
		            $_model->category="fb_".$type_sync;

		            if ($_model->save()) {
		            	$id_post=$_model->idpost;
		            }
		        }


        		foreach ($data as $key => $value) {
        			if ($post) {
	        			$attr=Attributes::model()->findByAttributes(array('key'=>$key,'idpost'=>$id_post));
	        		}else{
	        			$attr=new Attributes();
			            $attr->idpost=$id_post;            
			            $attr->key=$key;
	        		}
	        		
		            $attr->value=is_object($value)?json_encode($value):(is_array($value)?json_encode($value):$value);            
		            $attr->save();	
	        	}

        	}else{

        		if ($post) {
        			$attr=Attributes::model()->findByAttributes(array('key'=>$key_data,'idpost'=>$id_post));
        		}else{
        			$attr=new Attributes();
	            	$attr->idpost=$id_post;
	            	$attr->key=$key_data;
        		}
        		            
	            
	            $attr->value=is_object($data)?json_encode($data):(is_array($data)?json_encode($data):$data);            
	            $attr->save();

 	
        	}
        	

        	
        }

        return true;

    }

	public function actionFacebook(){
		

		
		$id_facebook_page=Configuration::model()->findByPk(1)->id_facebook_page;
		$model_about=Post::model()->findAll("category='fb_about'");
		$model_feed=Post::model()->findAll("category='fb_feed'");
		$model_contact=Post::model()->findAll("category='fb_contact'");
		$model_events=Post::model()->findAll("category='fb_event'");
		$model_gallery=Post::model()->findAll("category='fb_gallery'");
		
		$config=Configuration::model()->findByPk(1);

		if(isset($_POST['login']) || isset($_GET['code']) )
		{
			$facebook = new Facebook();
			
    		$redirect=$facebook->loginFB($config);
    		$this->redirect($redirect);
		}	

		if (isset($_POST['sync'])) {
			
			$type_sync=$_POST['sync'];

			$fb=new Facebook();

			$profile_id=$id_facebook_page;

			if ($id_facebook_page) {
				$response=$fb->getUserFB($profile_id,$type_sync);
        		$ret=$this->saveFBdata($response,$type_sync);
			}       		
        	

        	if ($ret) {
        		$this->refresh();
        		$this->redirect(array('/panel/facebook'));
        	}	
		}	
    	

		$this->render('facebook',array(
			'model_about'=>$model_about,
			'model_feeds'=>$model_feed,
			'model_contact'=>$model_contact,
			'model_events'=>$model_events,
			'model_gallery'=>$model_gallery,
			'config'=>$config
		));
	}

	public function actionConfig(){
		
		$model=Configuration::model()->findByPk(1);

		$language=Language::model()->findAll("estado=1 AND is_deleted='0'");

		if(isset($_POST['Configuration']))
		{	
			

			$model->attributes=$_POST['Configuration'];

			
			if($model->save()){	
				
				$model->logo=CUploadedFile::getInstance($model,'logo');
				if ( (is_object($model->logo) && get_class($model->logo)==='CUploadedFile')){
					$type=$model->logo->getType();
					switch ($type) {
						case 'image/jpeg':
							$type=".jpg";
							break;
						case 'image/png':
							$type=".png";
							break;
						case 'image/gif':
							$type=".gif";
							break;
					}
					$new_name_logo = rand(1000,9999).time(); // rand(1000,9999) optional
					$new_name_logo = 'files/'.md5($new_name_logo).$type; //optional

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