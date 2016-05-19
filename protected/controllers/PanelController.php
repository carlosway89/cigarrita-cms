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
		//$test=Configuration::model()->findAll();
		return array(
			array('allow',
				'actions'=>array('index','language','config','users','usersGroups','messages','pages','posts','blocks','links','facebook','delete','change','help','postConfig','variableType','modules','rendering','syncLanguage'),
				'users'=>array('@')
					// 'users'=>array('Yii::app()->user->checkAccess("webmaster")')
					),
			array('allow',
				'actions'=>array('delete'),
				'users'=>array('@')
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
		
		if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
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
				
				$message=$model->isNewRecord?Yii::t('app','panel.message.success.save'):Yii::t('app','panel.message.success.update');
			
				$model->attributes=$_POST['Language'];
				$model->estado=$model->estado=='on'?1:0;
				$model->min=$model->flag;

				if($model->save()){
					$this->redirect(array("panel/language/".$id."?message=".$message));					
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
		}else{
			$this->redirect(array('//panel/'));
		}
	}

	public function actionChange($id=null){

		$model=Language::model()->findByPk($id);

		if (isset($_POST['estado'])) {
			$model->estado=$_POST['estado'];
			$model->save();
		}


	}
	public function actionSyncLanguage(){
		$model=$this->uri(2)?$this->uri(2):"";
		$default_lang=Configuration::model()->findByPk(1)->language;
		$lang=$this->uri(3)?$this->uri(3):$default_lang;
		$_model=$model;
		$model=ucfirst($model);
		

		$message=Yii::t('app','panel.message.success.update');

		switch ($_model) {
			case 'menu':
				$page='links';
				$list=$model::model()->findAll("language='".$default_lang."' and is_deleted='0'");
				
				foreach ($list as $value) {
					$model_exist=$model::model()->findByAttributes(array("is_deleted"=>0,"language"=>$lang,"idlink"=>$value->idlink));
					if (!$model_exist) {
						$menu=new $model();
						$menu->attributes=$value->attributes;
						$menu->language=$lang;
						$menu->idlink=$value->idlink;					
						unset($menu->idmenu);
						
						if ($menu->save()) {
							
						}
					}
					
				}

				break;
			case 'block':
				$page='blocks';
				$list=$model::model()->findAll("language='".$default_lang."' and is_deleted='0'");
				

				foreach ($list as $value) {
					$model_exist=$model::model()->findByAttributes(array("is_deleted"=>0,"language"=>$lang,"idsync"=>$value->idsync));
					
					if (!$model_exist) {
						$block=new $model();
						$block->attributes=$value->attributes;
						$block->language=$lang;
						$block->idsync=$value->idsync;					
						unset($block->idblock);
						
						if ($block->save()) {
							
						}
					}
					
				}

				break;
			case 'post':
				$page='posts';
				$list=$model::model()->findAll("language='".$default_lang."' and is_deleted='0'");
				$cat=$this->uri(4)?$this->uri(4):Category::model()->find("tag='panel'")->category;

				foreach ($list as $value) {
					$model_exist=$model::model()->findByAttributes(array("is_deleted"=>0,"language"=>$lang,"idsync"=>$value->idsync));
					
					if (!$model_exist) {
						$post=new $model();
						$post->attributes=$value->attributes;
						$post->language=$lang;
						$post->idsync=$value->idsync;					
						unset($post->idpost);
						
						if ($post->save()) {
							
						}
					}
					
				}
				$this->redirect(array("panel/".$page."/".$cat."/".$lang."?message=".$message));
				break;
			default:
				$page='links';
				break;

		}
		$this->redirect(array("panel/".$page."/".$lang."?message=".$message));

	}
	public function actionHelp(){

		$this->render("//panel/help");

	}

	public function actionUsers($id=null){
		
		$model=new User();
		$message=null;
		$list=null;
		$criteria = new CDbCriteria;
		$users_groups=AuthItem::model()->findAll();

		$check_user=User::model()->findByAttributes(array('username'=>Yii::app()->user->id));

		if ($id!=null && is_numeric($id)) {
			if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
				$model=User::model()->findByPk($id);
				$render='//user/update';
			}else{
				if ($id==$check_user->iduser) {
					$model=User::model()->findByPk($id);
					$render='//user/update';
				}else{
					$this->redirect(array("panel/users"));
				}
			}
			
			

		}

		if(isset($_POST['User']))
		{	
			

			$message=$model->isNewRecord?Yii::t('app','panel.message.success.save'):Yii::t('app','panel.message.success.update');
			
			
			if ($model->isNewRecord) {
				$auth=new AuthAssignment();
				
			}else{
				$user_type="";
				foreach ($model->auth as $value_auth) {
					$user_type=$value_auth->itemname;
				}
				$auth=AuthAssignment::model()->findByAttributes(array('itemname' =>$user_type));

			}

			$pass=$model->password;
			$model->attributes=$_POST['User'];
			$model->estado=$model->estado=='on'?1:0;			
			$model->password=$pass==$model->password?$model->password:md5($model->password);

			
			if($model->save()){		

				$auth->itemname=isset($_POST['user_type'])?$_POST['user_type']:$user_type;
				$auth->userid=$model->username;
				$auth->iduser=$model->iduser;
				if ($auth->save()) {
					$id=$id!=null?"/".$id:"";
					$this->redirect(array("panel/users".$id."?message=".$message));
				}
				
											
				
			}
				
		}
		if ($id==null) {
			$criteria->with=array('auth');
			if (!Yii::app()->user->checkAccess("webmaster")) {
				if (Yii::app()->user->checkAccess("admin")) {
					$criteria->condition="is_deleted='0' and auth.itemname!='webmaster'";
				}else{
					$this->redirect(array("panel/users/".$check_user->iduser));					
				}								
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
			'users_groups'=>$users_groups

		));
	}
	public function actionUsersGroups($id=null)
	{
		$model=new AuthItem();
		$message=null;
		$list=AuthItem::model()->findAll();
		$render='//authItem/admin';

		if(isset($_POST['AuthItem']))
		{	
			
			$message=$model->isNewRecord?Yii::t('app','panel.message.success.save'):Yii::t('app','panel.message.success.update');
		
			$model->attributes=$_POST['AuthItem'];

			if($model->save()){
				$this->redirect(array("panel/usersgroups/".$id."?message=".$message));					
			}
				
		}

		$this->render($render,array(
			'model'=>$model,
			'message'=>$message,
			'list'=>$list
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

		// if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
			$default_cat=Category::model()->find("tag='panel'");
			$post_page=$this->uri(2)?$this->uri(2):($default_cat?$default_cat->category:"none");
			$lang=$this->uri(3)?$this->uri(3):Configuration::model()->findByPk(1)->language;

			$language=Language::model()->findAll("estado=1 AND is_deleted='0'");

			$category=Category::model()->findAll();

			$model=new Post();


			$attr=array();

			$message=null;
			$list=null;

			
			if (is_numeric($post_page)) {
				$id=$post_page;

				$model=Post::model()->findByPk($id);

				if ($model) {
					$_variables=Variable::model()->findAll("category='".$model->category."' and is_deleted='0'");

					foreach ($model->attributes0 as $has_attr) { 

		                $attr[]=$has_attr->Attributes;                                           

		            }
		            $post_config=PostConfiguration::model()->findByAttributes(array("category"=>$model->category));
		          
					

					$render='//post/update';
				}else{
					$this->redirect(array("panel/posts/"));
				}

			}
			if(isset($_POST['Post']))
			{	
				
				$model->attributes=$_POST['Post'];
				$model->state=$model->state=='on'?1:0;

				$message=$model->isNewRecord?Yii::t('app','panel.message.success.save'):Yii::t('app','panel.message.success.update');
				$is_new=$model->isNewRecord;

				if($model->save()){	
					if ($is_new) {
						$model->idsync=$model->idpost;
						$model->save();
					}	
					
					if (isset($_POST['Attr'])) {

						$new_attr=$_POST['Attr'];
						
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
							
							if ($_attributes->save()) {
								
							}

						}
					}	
				
					$this->redirect(array("panel/posts/".$post_page."/".$lang."?message=".$message));
				}
					
			}
			if (!is_numeric($post_page)){
				
				$_variables=Variable::model()->findAll("category='".$post_page."' and is_deleted='0'");
				
				$post_config=PostConfiguration::model()->findByAttributes(array("category"=>$post_page));

				$list=Post::model()->findAll("is_deleted='0' AND language = '".$lang."'AND category='".$post_page."' AND category!='fb_about' AND category!='fb_feed' AND category!='fb_event' AND category!='fb_gallery' AND category!='fb_contact' ");
				
				if($list){
					$render='//post/admin';
				}else{
					$this->redirect(array("panel/pages"));
				}
				
				
			}

			$this->render($render,array(
				'list'=>$list,
				'model'=>$model,
				'message'=>$message,
				'category'=>$category,
				'post_page'=>$post_page,
				'lang'=>$lang,
				'language'=>$language,
				'variables'=>$_variables,
				'attr'=>$attr,
				'post_config'=>$post_config
			));
		// }else{
		// 	$this->redirect(array('/panel'));
		// }
			
	}

	public function actionPostConfig(){


		$model=new PostConfiguration();
		$_variable=new Variable();
		$message=null;
		$config=null;
		$list=null;



		$_cat=$this->uri(2)?$this->uri(2):Category::model()->find("tag='panel'")->category;
		$_idpost=$this->uri(3)?$this->uri(3):"";

		$list=Variable::model()->findAll("category='".$_cat."' and is_deleted='0'");
		
		if ($_idpost=="") {
			$config=PostConfiguration::model()->find("idpost='0' and category='".$_cat."'");
		}else{
			if (is_numeric($_idpost)) {
				$config=PostConfiguration::model()->find("idpost='".$_idpost."' and category='".$_cat."'");
			}
		}

		if(isset($_POST['PostConfiguration']))
		{	
			
			$config->attributes=$_POST['PostConfiguration'];
			$config->crop=$config->crop=='on'?1:0;
			$config->has_source=$config->has_source=='on'?1:0;
			$config->has_header=$config->has_header=='on'?1:0;
			$config->has_subheader=$config->has_subheader=='on'?1:0;
			$config->has_teaser=$config->has_teaser=='on'?1:0;

			
			if($config->save()){				

				$message=1;
				unset($_POST['PostConfiguration']);				
			}
				
		}

		if(isset($_POST['Variable']))
		{
			$vars=$_POST['Variable'];
						
			
			
			
			for ($i=0; $i < count($vars['idvariable']); $i++) {

				
				
				$idvariable=$vars['idvariable'][$i];

				if ($idvariable!=0) {
					$_variable=Variable::model()->findByPk($idvariable);
					
				}else{
					$_variable=new Variable();
				}


				$_variable->type=$vars['type'][$i];
				$_variable->value=$vars['value'][$i];
				$_variable->category=$_cat;
				
				if ($_variable->type!="" && $_variable->value!="") {
					$_variable->save();
				}
				
			

			}

			$this->redirect(array("panel/postConfig/".$_cat));
			
		}
		
		$render='//postConfiguration/admin';

		$this->render($render,array(
			'model'=>$model,
			'message'=>$message,
			'config'=>$config,
			'list'=>$list
		));
	}

	public function actionVariableType(){

		$_id=$this->uri(2)?$this->uri(2):0;
		$type_id=$this->uri(3)?$this->uri(3):false;

		$list=VariableType::model()->findAll("idvariable='".$_id."' and is_deleted='0'");
		$render='//variableType/admin';

		if (!$type_id) {
			$model=new VariableType();
		}else{
			if (is_numeric($type_id)) {
				$model=VariableType::model()->findByPk($type_id);	
				$render='//variableType/update';
			}
			
		}
		
		$message=null;

		if(isset($_POST['VariableType']))
		{
			$message=$model->isNewRecord?Yii::t('app','panel.message.success.save'):Yii::t('app','panel.message.success.update');
			$model->attributes=$_POST['VariableType'];
			if (!is_numeric($type_id)) {
				$model->idvariable=$_id;
			}
			
			if($model->save()){		

				$this->redirect(array("panel/variableType/".$_id."?message=".$message));
			}
		}
		

		

		$this->render($render,array(
			'model'=>$model,
			'id'=>$_id,
			'message'=>$message,
			'list'=>$list
		));
	}
	public function actionModules(){


		$message=null;
		$model=new Modules();
		$list=Modules::model()->findAll("is_deleted='0'");
		$root=$_SERVER['DOCUMENT_ROOT'];
		$render="";
		$source=new stdClass();
		$source->php_source="";
		$source->js_source="";

		$id=$this->uri(2)?$this->uri(2):"";

		if (is_numeric($id)) {
			$model=Modules::model()->findByPk($id);
			if ($model) {
				if (!file_exists($root."/themes/design/modules")) {
				    mkdir($root."/themes/design/modules", 0777, true);
				}
				if (!file_exists($root."/themes/design/modules/$model->name")) {
				    mkdir($root."/themes/design/modules/$model->name", 0777, true);
				}
				if (!file_exists($root."/themes/design/modules/$model->name/php")) {
				    mkdir($root."/themes/design/modules/$model->name/php", 0777, true);
				}
				if (!file_exists($root."/themes/design/modules/$model->name/js")) {
				    mkdir($root."/themes/design/modules/$model->name/js", 0777, true);
				}
				
				$php_source=file_get_contents($root."/themes/design/modules/$model->name/php/$model->name".".php");
				$js_source=file_get_contents($root."/themes/design/modules/$model->name/js/$model->name".".js");
				
				$source->php_source=$php_source;
				$source->js_source=$js_source;
				$render='//modules/update';
			}else{
				$this->redirect(array("panel/modules/"));
			}
			
		}else{
			$render='//modules/admin';
		}

		if (isset($_POST["Modules"])) {
			$model->attributes=$_POST["Modules"];
			$model->state=$model->state=='on'?1:0;

			$source->php_source=$_POST["php_code"];
			$source->js_source=$_POST["js_code"];
			$message=$model->isNewRecord?Yii::t('app','panel.message.success.save'):Yii::t('app','panel.message.success.update');

			if ($model->save()) {
				if (!file_exists($root."/themes/design/modules")) {
				    mkdir($root."/themes/design/modules", 0777, true);
				}
				if (!file_exists($root."/themes/design/modules/$model->name")) {
				    mkdir($root."/themes/design/modules/$model->name", 0777, true);
				}
				if (!file_exists($root."/themes/design/modules/$model->name/php")) {
				    mkdir($root."/themes/design/modules/$model->name/php", 0777, true);
				}
				if (!file_exists($root."/themes/design/modules/$model->name/js")) {
				    mkdir($root."/themes/design/modules/$model->name/js", 0777, true);
				}

				$file_php = new SplFileObject($root."/themes/design/modules/$model->name/php/$model->name".".php",'w+');
				$file_js = new SplFileObject($root."/themes/design/modules/$model->name/js/$model->name".".js",'w+');		            
	            
	            $file_php->fwrite($source->php_source); 
	            $file_js->fwrite($source->js_source); 

	            $this->redirect(array("panel/modules/".$id."?message=".$message));	
			}
		}
		

		$this->render($render,array(
				'list'=>$list,
				'model'=>$model,
				'message'=>$message,
				'source'=>$source
		));

		
	}
	public function actionBlocks(){


		if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {

			$lang=$this->uri(2)?$this->uri(2):Configuration::model()->findByPk(1)->language;

			$language=Language::model()->findAll("estado=1 AND is_deleted='0'");

			$category=Category::model()->findAll();
			$list_blocks=Block::model()->findAll("language='".Configuration::model()->findByPk(1)->language."'");

			$model=new Block();

			$message=null;
			$list=null;
			
			if (is_numeric($lang)) {
				$id=$lang;

				$model=Block::model()->findByPk($id);

				$render='//block/update';

			}
			if(isset($_POST['Block']))
			{	
				$message=$model->isNewRecord?Yii::t('app','panel.message.success.save'):Yii::t('app','panel.message.success.update');
				$is_new=$model->isNewRecord;
				$model->attributes=$_POST['Block'];
				$model->state=$model->state=='on'?1:0;

				
				if($model->save()){	
					if ($is_new) {
						$model->idsync=$model->idblock;
						$model->save();	
					}
									
					$this->redirect(array("panel/blocks/".$lang."?message=".$message));					
					
				}
					
			}
			if (!is_numeric($lang)){
				
				$list=Block::model()->findAll("is_deleted='0' AND language = '".$lang."' AND category!='fb_about' AND category!='fb_feed' AND category!='fb_event' AND category!='fb_gallery' AND category!='fb_contact' ");
				$render='//block/admin';
				
			}

			$this->render($render,array(
				'list'=>$list,
				'model'=>$model,
				'message'=>$message,
				'category'=>$category,
				'language'=>$language,
				'list_blocks'=>$list_blocks,
				'lang'=>$lang
			));
			
			
		}else{
			$this->redirect(array('/panel'));
		}

		
	}
	public function actionPages($id=null){
		
		if (Yii::app()->user->checkAccess("webmaster")) {
			$model=new Page();

			$model_block=new Block();

			$model_category=new Category();

			$list_category=Category::model()->findAll();
			$list_blocks=Block::model()->findAll("language='".Configuration::model()->findByPk(1)->language."'");

			$message=null;
			$list=null;

			$root=$_SERVER['DOCUMENT_ROOT'];

			if (Yii::app()->user->checkAccess("webmaster")) {
				

				if (is_numeric($id)) {

					$model=Page::model()->findByPk($id);
					
					if ($model) {						
					
						$source=file_get_contents($root."/themes/design/views/site/$model->name".".php");
						// $file = new SplFileObject($root.'/themes/design/views/site/home'.'.php','w+');

						$model->source=$source;

						$render='//page/update';
					}else{
						$this->redirect(array("panel/pages/"));	
					}

				}

				if(isset($_POST['Page']))
				{	
					
					$model->attributes=$_POST['Page'];
					$model->state=$model->state=='on'?1:0;
					$model->single_page=$model->single_page=='on'?1:0;
					$model->layout=0;
					
					$_name=strtolower($model->name);
					$_name=preg_replace('/\s+/', '-', $_name);
					$sr=array('Ä','Ë','Ï','Ö','Ü','Á','É','Í','Ó','Ú','ä','ë','ï','ö','ü','ß','é','ñ','Ñ','í','ó','ú','á','é','à','è','ì','ò','ù');
					$rp=array('ae','ee','ie','oe','ue','a','e','i','o','u','ae','ee','ie','oe','ue','ss','e','nh','nh','i','o','u','e','a','e','i','o','u' );
					$model->name=str_replace($sr,$rp, $_name);

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
					$post_config=new PostConfiguration();
					$post_config->category=$model_category->category;
					
					if($model_category->save()){	
						$post_config->save();								
						$message="Successfully Updated";
						$list_category=Category::model()->findAll();
					}
						
				}

				if(isset($_POST['Block']))
				{	
					//$_lang=Language::model()->findAll("is_deleted='0'");

					$has_same_block=$_POST['idblock']!=""?1:0;

					
					
					if ($has_same_block) {

							$page_has_block=new PageHasBlock();
							$page_has_block->page_idpage=$_POST['page_id'];
							$page_has_block->block_idblock=$_POST['idblock'];
							if ($page_has_block->save()) {
								$message="Successfully Updated";
							}else{
								$message="Error Saving";
							}
					}else{

						// foreach ($_lang as $value) {					
					
							$model_block=new Block();
							$model_block->attributes=$_POST['Block'];
							$model_block->language=Configuration::model()->findByPk(1)->language;
							if ($model_block->isNewRecord) {
								$model_block->state=1;
							}else{
								$model_block->state=$model->state=='on'?1:0;
							}				
							
							if($model_block->save()){
								$model_block->idsync=$model_block->idblock;
								$model_block->save();
								$page_has_block=new PageHasBlock();
								$page_has_block->page_idpage=$_POST['page_id'];
								$page_has_block->block_idblock=$model_block->idblock;
								if ($page_has_block->save()) {
									$message="Successfully Updated";
								}else{
									$msg = "<h1>Error</h1>";
	                				$msg .= "<ul>";
									foreach($page_has_block->errors as $attribute=>$attr_errors) {
					                    $msg .= "<li>Attribute: $attribute</li>";
					                    $msg .= "<ul>";
					                    foreach($attr_errors as $attr_error) {
					                        $msg .= "<li>$attr_error</li>";
					                    }        
					                    $msg .= "</ul>";
					                }
					                $msg .= "</ul>";
									$message ="Error Saving".$msg;
								}
								
							}
						// }
					
					}
						
				}
			}
			else{
				// $list=Page::model()->findAll("is_deleted='0'");
				$render='//page/admin';
				// $this->redirect(array('panel/pages'));
			}

			if (!is_numeric($id)){
				
				$list=Page::model()->findAll("is_deleted='0' AND layout='0' ");
				$render='//page/admin';
				
			}

			$this->render($render,array(
				'list'=>$list,
				'list_category'=>$list_category,
				'list_blocks'=>$list_blocks,
				'lang'=>Configuration::model()->findByPk(1)->language,
				'model'=>$model,
				'model_block'=>$model_block,
				'model_category'=>$model_category,
				'message'=>$message,
			));
		}else{
			$this->redirect(array('//panel/'));
		}

		
	}

	public function actionLinks(){
		
		$lang=$this->uri(2)?$this->uri(2):Configuration::model()->findByPk(1)->language;
		
		$language=Language::model()->findAll("estado=1 AND is_deleted='0'");

		$page=Page::model()->findAll("state=1 AND is_deleted='0' and layout='0'");
		
		$criteria_block = new CDbCriteria;
		$criteria_block->select = "DISTINCT category";
		$criteria_block->condition=" state=1 AND is_deleted='0' AND language='".Configuration::model()->findByPk(1)->language."'";
		$block=Block::model()->findAll($criteria_block);
		

		$model=new Menu();

		$message=null;
		$hierarchy=null;

		$criteria=new CDbCriteria;

		$criteria->select="max(hierarchy) AS hierarchy";
		$criteria->condition="is_deleted='0' AND language = '".Configuration::model()->findByPk(1)->language."'";
		$hierarchy=Menu::model()->find($criteria)->hierarchy;

		$list=Menu::model()->findAll("is_deleted='0' AND language = '".$lang."' order by t.position");
		

		

		if (is_numeric($lang)) {
			$id=$lang;


			$list=Menu::model()->findAll("is_deleted='0' AND language = '".Configuration::model()->findByPk(1)->language."' order by t.position");
			$model=Menu::model()->findByPk($id);

			$render='//menu/menu';

		}

		if(isset($_POST['Menu']))
		{	
			
			$message=$model->isNewRecord?Yii::t('app','panel.message.success.save'):Yii::t('app','panel.message.success.update');
			if ($model->isNewRecord) {
				
				// $_lang=Language::model()->findAll("is_deleted='0'");

				// foreach ($_lang as $value) {					
					$model=new Menu();
					$model->attributes=$_POST['Menu'];
					// $model->name=preg_replace('/\s+/', '-', $model->name);
					$model->state=$model->state=='on'?1:0;					
					$model->language=Configuration::model()->findByPk(1)->language;

					if ($model->save()) {
						$model->idlink=$model->idmenu;
						$model->save();
					}				
					
				// }

				$this->redirect(array("panel/links/".$lang."?message=".$message));	
			}else{
				$model->attributes=$_POST['Menu'];
				$model->state=$model->state=='on'?1:0;
				
				if($model->save()){	

					$model->unsetAttributes();	
					$this->redirect(array("panel/links/".$lang."?message=".$message));				
					// $this->redirect(array("panel/links/".$lang,"message"=>$message));									
									
				}
			}					
			
				
		}


		if (!is_numeric($lang)){
			
			// $list=Menu::model()->findAll("is_deleted='0' AND language = '".$lang."' order by t.position");
			$render='//menu/admin';
			
		}

		$tree_array=array();

		$pos=0;


		foreach ($list as $val) {
			$tree_array[$pos]=$val->attributes;
			$pos++;
		}


		$pidKey="parent_id";
		$idKey="idlink";

		$grouped = array();
		foreach ($tree_array as $sub){
		    $grouped[$sub[$pidKey]][] = $sub;
		}


		$fnBuilder = function($siblings) use (&$fnBuilder, $grouped, $idKey) {
		    foreach ($siblings as $k => $sibling) {
		        $id = $sibling[$idKey];
		        if(isset($grouped[$id])) {
		            $sibling['sub_menu'] = $fnBuilder($grouped[$id]);
		        }
		        $siblings[$k] = $sibling;
		    }

		    return $siblings;
		};

		if ($tree_array) {
			$tree = $fnBuilder($grouped[0]);
		}else{
			$tree=array();
		}
		


		$this->render($render,array(
				'model'=>$model,
				'page'=>$page,
				'block'=>$block,
				'language'=>$language,
				'message'=>$message,
				'list'=>$list,
				'tree'=>$tree,
				'lang'=>$lang,
				'hierarchy'=>$hierarchy
		));

	}
	public function actionRendering(){


	}
	public function actionDelete(){
		

		if (Yii::app()->user->checkAccess("admin") || Yii::app()->user->checkAccess("webmaster")) {
	                          
			$_model=$this->uri(2);
			$id=$this->uri(3);
			$attr1=$this->uri(4);
			$attr2=$this->uri(5);

			$root=$_SERVER['DOCUMENT_ROOT'];

			$model=ucfirst($_model);

			if ($_model=='pageHasBlock') {
				$model=$model::model()->findByAttributes(array("id_page_has_block"=>$id));
			}else{
				$model=$model::model()->findByPk($id);	
			}
			

			$model->is_deleted=1;

			
			if($model->save()){						
				switch ($_model) {
					case 'menu':
						$link='links/'.$attr1;
						break;
					case 'user':
						$link='users';
						break;
					case 'form':
						$link='messages';
						break;
					case 'post':
						$link='posts/'.$attr1.'/'.$attr2;
						break;
					case 'page':
						$link='pages';
						unlink($root."/themes/design/views/site/$model->name".".php");
						$model->delete();
						break;	
					case 'block':
						$link='blocks';
						break;
					case 'pageHasBlock':
						$link='pages';
						break;
					case 'variableType':
						$link='variableType/'.$attr1;
						break;	
					case 'variable':
						$link='postConfig/'.$attr1;
						break;				
					default:
						$link=$_model;
						break;
				}

				$this->redirect(array('//panel/'.$link.'/'));
			}else{
				print_r($model->errors);
			}
		}else{
			$this->redirect(array('//panel/'));
		}
			

		
        
	}

	private function saveFBdata($response,$type_sync){
        


        $id=$response['id'];
        
        $cat=Category::model()->findByAttributes(array('category'=>"fb_".$type_sync));

        

        if (!$cat) {
            $cat_model=new Category();
            $cat_model->category="fb_".$type_sync;
            $cat_model->tag="facebook";
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
        		// $data_response=$response['photos']->data;
        		$data_response=$response['albums']->data;
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
    			$_model->language=Configuration::model()->findByPk(1)->language;
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
	        		$_model->language=Configuration::model()->findByPk(1)->language;
		  
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
			$message=$model->isNewRecord?Yii::t('app','panel.message.success.save'):Yii::t('app','panel.message.success.update');
			
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

		//to set a redirect url and save 
		$url=Yii::app()->getRequest()->getRequestUri();
		Yii::app()->user->setReturnUrl($url);

		$this->render('index');
	}




}