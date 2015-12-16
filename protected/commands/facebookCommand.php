<?php

class facebookCommand extends CConsoleCommand {
	


 	public function run() {

        
        $id_facebook_page=Configuration::model()->findByPk(1)->id_facebook_page;
        $language_initial=Configuration::model()->findByPk(1)->language;

        $fb=new Facebook();

		$profile_id=$id_facebook_page;

		$syncs=array('about','contact','feed','event','gallery');

		if ($id_facebook_page) {
			foreach ($syncs as $value) {
				$response=$fb->getUserFB($profile_id,$value);
    			$ret=$this->saveFBdata($response,$value,$language_initial);
			}			
		} 

        echo "data sync successful \n";
 		
 	}

 	private function saveFBdata($response,$type_sync,$language_initial){
        


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
    			$_model->language=$language_initial;
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
	        		$_model->language=$language_initial;
		  
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


} 

?>