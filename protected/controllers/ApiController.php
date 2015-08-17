<?php
error_reporting(E_ALL ^ E_NOTICE);
class ApiController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    // public $layout='//layouts/column2';
    private $format = 'json';

    private $language_initial='es';

    private $uri=null;
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index','admin','create','view','form','update','list','upload','runFile','menuSort','multiLanguage','myuser','dataFacebookSync'),
                // 'expression'=>'Yii::app()->user->checkAccess("administrador")',
                'users'=>array('@'),
                ),
            array('allow',
                'actions'=>array('index','list','view','form','flag','tester','content','facebook','template'),
                'users'=>array('*'),
                ),
            array('deny',  // deny all to users
                'users'=>array('*'),
                ),
            );
    }

    public function _checkAuth($model="donot"){

        if (!Yii::app()->user->id) {
            if ($model!="Post" and $model!="Menu" and $model!="Language" and $model!="Content" ) {
                $msg=array("error"=>401,"message"=>"Not Allowed");
                $this->_sendResponse(401,CJSON::encode($msg));
            }
        }       

        
    }

    public function uri($i){

        // $url=Yii::app()->request->url;
        $url=Yii::app()->request->getPathInfo();
        $uri = explode("/", $url);

        return $uri[$i];
    }

    public function actionTemplate(){

        
        $template=strtolower($this->uri(2));
        $type=$this->uri(3);
        $var="";
        $this->render("/$type/".$template,array("var"=>$var));
        // echo $id;
    }

    public function actionMyuser(){


        $called=$_SERVER['REQUEST_METHOD'];
        $iduser=Yii::app()->user->getState('iduser');
        $user=User::model()->findByPk($iduser);
        
        switch ($called) {
            case 'GET':           

                $this->_sendResponse(200, $this->_getObjectEncoded('User', $user->attributes));
                
                break;
            // case 'POST':

            //     $requestBody = Yii::app()->request->getRawBody();

            //     $parsedRequest = CJSON::decode($requestBody);
                  
            //     $this->actionCreate('User',$parsedRequest);               
            
            // break;
            case 'PUT':
                

                $requestBody = Yii::app()->request->getRawBody();
                $parsedRequest = CJSON::decode($requestBody);
                $parsedRequest['password']=md5($parsedRequest['new_password']);

                $this->actionUpdate('User',$iduser,$parsedRequest); 

 
            
            break;
            default:
                break;
        }

    }

    public function actionMultiLanguage(){

        $new_lang=$this->uri(2);

        // $requestBody = Yii::app()->request->getRawBody();

        // $parsedRequest = CJSON::decode($requestBody);

        $new_menu= new Menu();

        $model=Menu::model()->findAll(" language = '$this->language_initial'");

        $new_model=Menu::model()->findAll(" language = '$new_lang'");

        foreach ($model as $key_menu=>$menu) {
            if (!$new_model) {
                $new_menu= new Menu();
                $new_menu->attributes=$menu->attributes;
                $new_menu->language=$new_lang; 
                $new_menu->name="$new_lang-".$new_menu->name;               
                // $new_menu->save();
                if ($new_menu->save()) {
                    $content=Content::model()->findAll(" idmenu = '$menu->idmenu'");

                    foreach ($content as $key_cont => $content) {
                        $new_content=new Content();
                        $new_content->attributes=$content->attributes;
                        $new_content->idmenu=$new_menu->idmenu;
                        $new_content->language=$new_lang; 

                        if ($new_content->save()) {
                            $post=Post::model()->findAll(" idcontent = '$content->idcontent'");

                            foreach ($post as $key_post => $post) {
                                $new_post=new Post();
                                $new_post->attributes=$post->attributes;
                                $new_post->idcontent=$new_content->idcontent;
                                $new_post->language=$new_lang;
                                $new_post->save();
                            }
                        }
                    }
                }

                


            }else{
                
                $url=$menu->url;
                $found=false;
                foreach ($new_model as $key => $value) {
                    if ($url==$value->url) {
                        $found=true;
                        break;
                    }
                }
                if (!$found) {
                    $new_menu= new Menu();
                    $new_menu->attributes=$menu->attributes;
                    $new_menu->language=$new_lang;
                    $new_menu->name="$new_lang-".$new_menu->name;                
                    
                    if ($new_menu->save()) {
                        $content=Content::model()->findAll(" idmenu = '$menu->idmenu'");

                        foreach ($content as $key_cont => $content) {
                            $new_content=new Content();
                            $new_content->attributes=$content->attributes;
                            $new_content->idmenu=$new_menu->idmenu;
                            $new_content->language=$new_lang; 

                            if ($new_content->save()) {
                                $post=Post::model()->findAll(" idcontent = '$content->idcontent'");

                                foreach ($post as $key_post => $post) {
                                    $new_post=new Post();
                                    $new_post->attributes=$post->attributes;
                                    $new_post->idcontent=$new_content->idcontent;
                                    $new_post->language=$new_lang;
                                    $new_post->save();
                                }
                            }
                        }
                    }
                }
            }

            $array[]=array("success"=>1);
                
                
        }

        // foreach ($variable as $key => $value) {
        //     # code...
        // }

        header('Content-type: application/json');

            // print_r($array);
        echo CJSON::encode($array);

        // print_r($array);

        // echo $new_lang;

        // $this->actionCreate($model,$parsedRequest);

        // $this->actionUpdate($model,$id,$parsedRequest);
    }

    public function actionRunFile()
    {   

        try {
        $criteria = new CDbCriteria;
        $criteria->condition="language = 'es' and estado=1";
        $criteria->limit = 1000;
        // $criteria->order="ASC"

        $menu=Menu::model()->findAll($criteria);

        $col_menu="";
        $column=array();

        foreach ($menu as $value) {
            $val=str_replace('#','principal',$value->attributes['url']);
            $ext=$value->attributes['minimal']?"":"-ext";
            $column[]=str_replace('/','',$val.$ext);
            
        }
        $col_menu=implode(",",$column);
        $root=$_SERVER['DOCUMENT_ROOT'];

        $file=Yii::app()->getBaseUrl(true)."/js/vendor/router_template.php?var=".$col_menu;

        // print_r($test);
        $c = curl_init($file);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $page = curl_exec($c);
        curl_close($c);

        
            $file = new SplFileObject($root."/js/vendor/router.js",'w+');
            // $file->seek(57);     // Seek 9999 postion to show line no. 10,000
            // echo 'aqui'.$file->current();
            // $string="\n"; 
            // foreach ($test as $value) {
            //     $string=$string.$value."\n";
            // }
            
            $file->fwrite($page); // write over the line specify above
        } catch (Exception $e) {
            echo $e;
        }
        
    }
    public function actionTester(){

            // $profile_id=$this->uri(2);
            // $connection = Yii::app()->db;//get connection
            // $dbSchema = $connection->schema;
            // //or $connection->getSchema();
            // $tables = $dbSchema->getTables();//returns array of tbl schema's
            // foreach($tables as $tbl)
            // {

            //     echo $tbl->rawName, ':<br/>', implode(', ', $tbl->columnNames), '<br/>';
            // }

            // $model=new Menu('search');

            // $data=$model->search()->getData();

            // $array=array();
            // echo $profile_id;
        
        // Create DOM from URL or file
        // $html = new HTMLDOM();

        // $url=Yii::app()->getBaseUrl(true)."/api/template/view/site";
        // $html=$html->get($url);

        // foreach($html->find('[data-id="subheader"]') as $element)
        //        echo "elemento: ".$element. '<br>';

        $criteria = new CDbCriteria;

       

        $criteria->with = array(
            'menuSubMenus.idsubMenu' => array(
                // 'together' => true,
                'select' => false,
            ),
        );


        $model = Menu::model()->findAll($criteria);


        $array=array();

        foreach($model as $value)
        {   

            foreach($value->menuSubMenus as $post)
            {   
                $array[]=$post->idsubMenu;
            }
        }

        echo CJSON::encode($array);

    }


    public function actionFacebook(){

        //url cigarrita-worker.com/api/facebook/{id_facebook}/data
        //ex. cigarrita-worker.com/api/faceboob/1431968783721316/data

        $profile_id=$this->uri(2);

        $fb=new Facebook();

        $response=$fb->getUserFB($profile_id);

        // $this->_getObjectEncoded();
        $this->_sendResponse(200, CJSON::encode($response));
    }
    
    private function saveFBdata($model,$response){
        

        $id=$response->id;

        $attr=$model::model()->findByPk($id);  

        if ($attr) {
            $_model=$attr;
        }
        else{
            $_model=new $model();
        }

        foreach($response as $var=>$value) {
            
            if($_model->hasAttribute($var)) {
                $_model->$var =  is_object($value)?json_encode($value):(is_array($value)?json_encode($value):$value);
            } 

        }

        if($_model->save()) {
            return 1;
        } else {
            // Errors occurred
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach($_model->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }        
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg );
        }
    }

    public function actionDataFacebookSync(){
        $profile_id=$this->uri(2);
        $type_sync=$this->uri(3)?$this->uri(3):'all';

        $fb=new facebook();

        $response=$fb->getUserFB($profile_id,$type_sync);

        switch ($type_sync) {
            case 'about':
                if ($this->saveFBdata("About",$response)) {
                    echo 1;
                } 
            break;
            case 'contact':
                if ($this->saveFBdata("Contact",$response)) {
                    echo 1;
                }
            break;
            case 'feed':
                $feeds=$response['posts']->data;

                foreach ($feeds as $feeds_key => $feeds_val) {
                    $this->saveFBdata("Feed",$feeds_val);
                }
                echo 1;

            break; 
            case 'event':
               $events=$response['events']->data;
               foreach ($events as $events_key => $events_val) {
                    $this->saveFBdata("Event",$events_val);
                }
                echo 1;
            break; 
            case 'gallery':
                $albums=$response['albums']->data;

                foreach ($albums as $albums_key => $albums_val) {
                    $photos=$albums_val->photos->data;
                    $this->saveFBdata("Gallery",$albums_val);
                    foreach ($photos as $val) {
                        $val= (object) array_merge((array) $val,array("belong"=>$albums_val->id));
                        $this->saveFBdata("Gallery",$val);
                    }
                    
                } 
                echo 1;
            break;         
            default:
              echo 'All';
              break;
        }

        
 

    }



    public function actionUpload(){

        $output_dir = "files/";
        $string=(string)'file'.date('Y-m-d-H-i-s');
        
        if(isset($_FILES["images"]))
        {
            $ret = array();

            $error =$_FILES["images"]["error"];
            //You need to handle  both cases
            //If Any browser does not support serializing of multiple files using FormData() 
            if(!is_array($_FILES["images"]["name"])) //single file
            {
                $fileName = $_FILES["images"]["name"];
                move_uploaded_file($_FILES["images"]["tmp_name"],$output_dir.$string.$fileName);
                $ret= ['name'=>$fileName,'url'=>$output_dir.$string.$fileName];
            }
            else  //Multiple files, file[]
            {
              $fileCount = count($_FILES["images"]["name"]);
              for($i=0; $i < $fileCount; $i++)
              {
                $fileName = $_FILES["images"]["name"][$i];
                move_uploaded_file($_FILES["images"]["tmp_name"][$i],$output_dir.$fileName);
                $ret[]= $fileName;
              }

            }
            $this->_sendResponse(200, CJSON::encode($ret));
         }else{
            echo 'error';
         }

    }

    public function actionMenuSort(){

        header('Content-Type: application/json');

        $requestBody = Yii::app()->request->getRawBody();

        $parsedRequest = CJSON::decode($requestBody);


        // $array=json_decode(stripslashes($_POST['json']));
        // foreach ($parsedRequest['json'] as $key => $value) {
        //     echo "id=".$key."val=".$value;
        // }
        $done=1;

           // print_r($parsedRequest);

        foreach ($parsedRequest as $key => $value) {
            $menu=Menu::model()->findByPk($value);  
            $menu->position=$key;
            if($menu->save()) {
                $done=$done*1;           
            } else {
                $done=$done*0;
                $msg = "<h1>Error</h1>";
                $msg .= sprintf("Couldn't update model <b>%s</b>", $_GET['model']);
                $msg .= "<ul>";
                foreach($model->errors as $attribute=>$attr_errors) {
                    $msg .= "<li>Attribute: $attribute</li>";
                    $msg .= "<ul>";
                    foreach($attr_errors as $attr_error) {
                        $msg .= "<li>$attr_error</li>";
                    }        
                    $msg .= "</ul>";
                }
                $msg .= "</ul>";
                $this->_sendResponse(500, $msg );
            }
        }
        $rows=array("success"=>$done);
        $this->_sendResponse(200, CJSON::encode($rows));

    }

    public function actionContent(){

        $criteria = new CDbCriteria;

        $filter=$this->uri(2);

        $criteria->condition="";
        
        $criteria->limit = 1000;

        if ($filter) {
           
            $filter=json_decode($filter);
            
            if (is_object($filter)) {
                
                $_model=new Page;
                $_block=new Block;

                foreach ($filter as $key => $value) {

                    $value=is_object($value)?$value:str_replace("'","",$value);
                  
                    if ($key=="like") {
                        if (is_object($value)) {                        
                            foreach ($value as $key_like => $val_like) {

                                $val_like=str_replace("'","",$val_like);

                                if($_model->hasAttribute($key_like)) {
                                    $condition[]="t.".$key_like." LIKE '%".$val_like."%'";
                                }
                            } 
                        }                      
                    }else{
                        if($_model->hasAttribute($key)) {
                            $condition[]="t.".$key."='".$value."'";
                        }else{
                            if($_block->hasAttribute($key))
                                $condition[]="blockIdblock.".$key."='".$value."'";                                
                        }
                        
                    }
                }       

                $string=$condition[0];

                for ($i=1; $i <count($condition); $i++) { 
                    $string.=' AND '.$condition[$i];
                }
                $criteria->condition=$string;
            }

            

        }
        // $criteria->with=array('pageHasBlocks.blockIdblock.blockHasPosts.postIdpost');
        $criteria->with=array('pageHasBlocks.blockIdblock.category0.posts');
        

        $criteria->together = true; 

        $model=Page::model()->findAll($criteria);

        $array=array();

        foreach($model as $value)
        {   

            foreach($value->pageHasBlocks as $key_block => $has_block)
            {   
                $array[]=$has_block->blockIdblock->attributes;

                
                $subarray=array();
                
                foreach ($has_block->blockIdblock->category0->posts as $key_post => $has_post) {

                    $subarray[]=$has_post->attributes;

                    //if has extra attributes
                    foreach ($has_post->postHasAttributes as $key_attr => $has_attr) { 
                        $attr=$has_attr->attributesIdattributes;                     
                        $subarray[$key_post]=array_merge($subarray[$key_post],array($attr->key=>$attr->value));                        

                    }
                    //end extra attributes

                }

                $array[$key_block]=array_merge($array[$key_block],array('posts'=>$subarray));
            }

        }

        $this->_sendResponse(200, CJSON::encode($array));
    }

    public function actionFlag(){

        
        $dir=$_SERVER['DOCUMENT_ROOT'].'/flags/4x3';

        $files = scandir($dir);
        $rows = array();

        foreach ($files as $key => $value) {
            if ( $value!="." && $value!="..") {
                // $rows[] = 'value';
               $value=str_replace('.svg', '', $value);
               $rows[] = ['value'=>$value,'flag'=>'flag-icon-'.$value];
            }
            
        }                 

        $this->_sendResponse(200, CJSON::encode($rows));

    }

    function getRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
            
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        
        return $_SERVER['REMOTE_ADDR'];
    }

    public function actionForm(){

        $requestBody = Yii::app()->request->getRawBody();

        $attributes = CJSON::decode($requestBody);
                  
        $country = new GeofromIp();

        $model = new Form();  

        foreach($attributes as $var=>$value) {
            
            if($model->hasAttribute($var)) {
                $model->$var = $value;
            } 
            
            // else {
            //     $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $_GET['model']) );
            // }

        }
            // $model->date = date('');
            $model->ip_address = $this->getRealIP();
            $model->country_name = $country->getCountryFromIP($this->getRealIP(), " NamE ");;
            $model->browser = $_SERVER['HTTP_USER_AGENT'];
            $model->device = '';

        // Try to save the model
        if($model->save()) {
            // Saving was OK
            $this->_sendResponse(200, $this->_getObjectEncoded($_GET['model'], $model->attributes) );
        } else {
            // Errors occurred
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach($model->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }        
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg );
        }

    }


    public function actionIndex()
    {
        $model=ucfirst($this->uri(2));

        $called=$_SERVER['REQUEST_METHOD'];

        echo 'Not Allowed';

        // switch ($called) {
        //     case 'GET':
        //         if ($this->uri(4)) {
        //             $this->actionList($model,$this->uri(4)); 
        //         }else{
        //             if ($this->uri(3)) {
        //                 $this->actionView($model,$this->uri(3));
        //             }
        //             else{                        
        //                $this->actionList($model,null); 
        //             }
                    
        //         }                
                
        //         break;

        //     case 'POST':

        //             $requestBody = Yii::app()->request->getRawBody();

        //             $parsedRequest = CJSON::decode($requestBody);
                  
        //             $this->actionCreate($model);
                
        //         break;
        //     case 'PUT':

        //         $requestBody = Yii::app()->request->getRawBody();

        //         $parsedRequest = CJSON::decode($requestBody);
        //         $this->actionUpdate($model,$this->uri(3));
        //     case 'DELETE':
              
        //         $this->actionDelete($model,$this->uri(3));
            
        //     break;
        //     default:
        //         break;
        // }
    }

    public static function class_exists($className) {
        return file_exists(Yii::getPathOfAlias('application.models').DIRECTORY_SEPARATOR.$className.'.php');
    }

    public function actionList($model,$filter)
    {   
        
        $model=ucfirst($model);
        $this->_checkAuth($model);

        if ($this->class_exists($model)) {
            
            $criteria = new CDbCriteria;

            $criteria->condition="";

            $criteria->limit = 1000;

            if ($filter) {
               
                $filter=json_decode($filter);
                
                if (is_object($filter)) {

                    $_model=new $model;
                    foreach ($filter as $key => $value) {
                        
                        $value=is_object($value)?$value:str_replace("'","",$value);

                        if ($key=="like") {

                            if (is_object($value)) {                        
                                foreach ($value as $key_like => $val_like) {

                                    $val_like=str_replace("'","",$val_like);

                                    if($_model->hasAttribute($key_like)) {
                                        $condition[]=$key_like." LIKE '%".$val_like."%'";
                                    }
                                } 
                            }                   
                        }else{
                            if ($key=="orderby") {
                                if (is_object($value)) {
                                    $order=$value->order?$value->order:1;
                                    $type=$value->type=="DESC"?$value->type:"ASC";
                                    if($_model->hasAttribute($order)) {
                                        $criteria->order = "$order $type";
                                    }
                                }else{
                                   if($_model->hasAttribute($value)) {
                                        $criteria->order = "$value ASC";
                                    } 
                                }                            
                            }else{
                                if ($key=="limit") {
                                    if (is_object($value)) {
                                        $start=(int)$value->start?$value->start:1;
                                        $limit=(int)$value->limit?$value->limit:10;
                                        $criteria->limit =$limit;
                                        $criteria->offset=$start;
                                    }else{
                                        $value=(int)$value;
                                        $criteria->limit = is_int($value)?$value:1000;
                                    }                                    
                                }else{
                                    if($_model->hasAttribute($key)) {
                                        $condition[]=$key."='".$value."'";
                                    }
                                }
                            }
                            
                        }
                    }       

                    $string=$condition[0];

                    for ($i=1; $i <count($condition); $i++) { 
                        $string.=" AND ".$condition[$i];
                    }

                    $criteria->condition=$string;

                    if ($_model->hasAttribute("position")) {
                        $criteria->order="position";
                    }
                }
            }
            

           
            $models=$model::model()->findAll($criteria);

        }else{
            $models=array("error"=>204,"message"=>"doesn't exits such a model");            
        }

        


        if(is_null($models)) {
             $this->_sendResponse(200, sprintf('No items where found for model <b>%s</b>', $_GET['model']) );
        } else {
                 
             $this->_sendResponse(200, CJSON::encode($models));
        }

    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($model,$id)
    {
        
       $model=ucfirst($model);

       $this->_checkAuth($model);
        // if(!isset($_GET['id']))
        //     $this->_sendResponse(500, 'Error: Parameter <b>id</b> is missing' );

        $model = $model::model()->findByPk($id);

    
        if(is_null($model)) {
            $this->_sendResponse(404, 'No Item found with id '.$_GET['id']);
        } else {
            $this->_sendResponse(200, CJSON::encode($model));
            // $this->_sendResponse(200, $this->_getObjectEncoded($_GET['model'], $model->attributes));
        }
    }

    // }}} 
    // {{{ actionCreate
    /**
     * Creates a new item
     * 
     * @access public
     * @return void
     */


    public function actionCreate($model)
    {
        $this->_checkAuth();

        $model=ucfirst($model);

        $requestBody = Yii::app()->request->getRawBody();

        $attributes = CJSON::decode($requestBody);

        $model = new $model();  

        

        foreach($attributes as $var=>$value) {
            
            if($model->hasAttribute($var)) {
                $model->$var = $value;
            } 
            // else {
            //     // No, raise an error
            //     $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $_GET['model']) );
            // }

        }

        
        $this->saveLog("create:".$modelo);

        if ($model!='user') {
            // Try to save the model
            if($model->save()) {
                // Saving was OK
                
                $this->_sendResponse(200, $this->_getObjectEncoded($_GET['model'], $model->attributes) );
                
            } else {
                // Errors occurred
                $msg = "<h1>Error</h1>";
                $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
                $msg .= "<ul>";
                foreach($model->errors as $attribute=>$attr_errors) {
                    $msg .= "<li>Attribute: $attribute</li>";
                    $msg .= "<ul>";
                    foreach($attr_errors as $attr_error) {
                        $msg .= "<li>$attr_error</li>";
                    }        
                    $msg .= "</ul>";
                }
                $msg .= "</ul>";
                $this->_sendResponse(500, $msg );
            }
        }else{
            $this->_sendResponse(500, "Forbidden Action" );
        }


        

        // var_dump($_REQUEST);
    } // }}}     
    // {{{ actionUpdate
    /**
     * Update a single iten
     * 
     * @access public
     * @return void
     */
    public function actionUpdate($model,$id)
    {
        $this->_checkAuth();

        // Get PUT parameters
        // parse_str(file_get_contents('php://input'), $put_vars);
        $model=ucfirst($model);

        $requestBody = Yii::app()->request->getRawBody();

        $put_vars = CJSON::decode($requestBody);
        
        $model = $model::model()->findByPk($id);    

        $this->saveLog("update:".$modelo);

        if(is_null($model))
            $this->_sendResponse(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.",$_GET['model'], $_GET['id']) );
        
        if ($model=='user') 
            $this->_sendResponse(500, "Forbidden Action" );

        // Try to assign PUT parameters to attributes
        foreach($put_vars as $var=>$value) {
            // Does model have this attribute?
            if($model->hasAttribute($var)) {
                $model->$var = $value;
            } 
            // else {
            //     // No, raise error
            //     $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $_GET['model']) );
            // }
        }
        // Try to save the model
        if($model->save()) {
             
            $this->_sendResponse(200, $this->_getObjectEncoded($_GET['model'], $model->attributes) );           
        } else {
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't update model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach($model->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }        
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg );
        }
    } // }}} 
    // {{{ actionDelete
    /**
     * Deletes a single item
     * 
     * @access public
     * @return void
     */
    public function actionDelete($model,$id)
    {
        $this->_checkAuth();

        $model=ucfirst($model); 

        $model = $model::model()->findByPk($id);   

        // Was a model found?
        if(is_null($model)) {
            // No, raise an error
            $this->_sendResponse(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.",$_GET['model'], $_GET['id']) );
        }

        // Delete the model
        $num = $model->delete();
        if($num>0)
            echo 1;
        else
            $this->_sendResponse(500, sprintf("Error: Couldn't delete model <b>%s</b> with ID <b>%s</b>.",$_GET['model'], $_GET['id']) );
    }

    private function saveLog($action){
        $model=new Log();
        $model->action=$action;
        $model->user=Yii::app()->User->id;
        $model->ip=$this->getRealIP();

        if (!$model->save()) {
            // Errors occurred
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach($model->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }        
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg );
        }
    }


    private function _sendResponse($status = 200, $body = '', $content_type = 'application/json')
    {
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        // set the status
        header($status_header);
        // set the content type
        header('Content-type: ' . $content_type);

        // pages with body are easy
        if($body != '')
        {
            // send the body
            echo $body;
            exit;
        }
        // we need to create the body if none is passed
        else
        {
            // create some body messages
            $message = '';

            // this is purely optional, but makes the pages a little nicer to read
            // for your users.  Since you won't likely send a lot of different status codes,
            // this also shouldn't be too ponderous to maintain
            switch($status)
            {
                case 401:
                    $message = 'You must be authorized to view this page.';
                    break;
                case 404:
                    $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                    break;
                case 500:
                    $message = 'The server encountered an error processing your request.';
                    break;
                case 501:
                    $message = 'The requested method is not implemented.';
                    break;
            }

            // servers don't always have a signature turned on (this is an apache directive "ServerSignature On")
            $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

            // this should be templatized in a real-world solution
            $body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                                <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
                            </head>
                            <body>
                                <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
                                <p>' . $message . '</p>
                                <hr />
                                <address>' . $signature . '</address>
                            </body>
                        </html>';

            echo $body;
            exit;
        }
    } 

    private function _getStatusCodeMessage($status)
    {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );

        return (isset($codes[$status])) ? $codes[$status] : '';
    }

    private function _getObjectEncoded($model, $array)
    {
        if(isset($_GET['format']))
            $this->format = $_GET['format'];

        if($this->format=='json')
        {
            return CJSON::encode($array);
        }
        elseif($this->format=='xml')
        {
            $result = '<?xml version="1.0">';
            $result .= "\n<$model>\n";
            foreach($array as $key=>$value)
                $result .= "    <$key>".utf8_encode($value)."</$key>\n"; 
            $result .= '</'.$model.'>';
            return $result;
        }
        else
        {
            return;
        }
    }
}
