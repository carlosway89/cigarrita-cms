<?php

class FacebookSyncController extends Controller
{	
	public function filters()
    {
            return array(
                    'accessControl', // perform access control for CRUD operations
            );
    }

	public function accessRules()
	{	
		
		return array(
			array('allow',
				'actions'=>array('index','facebook'),
				'users'=>array('@')
				),
			array('deny',
					'users'=>array('*'),
				)
			);
	}
	public function actionIndex()
	{
		echo "test controller";
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
	
}