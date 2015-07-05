<?php
// Pass session data over.
session_start();
 
// Include the required dependencies.
require_once( 'vendor/autoload.php' );
 
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\GraphUser;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookCanvasLoginHelper;

class facebook
{

	// Use one of the helper classes to get a FacebookSession object.
	//   FacebookRedirectLoginHelper
	//   FacebookCanvasLoginHelper
	//   FacebookJavaScriptLoginHelper
	// or create a FacebookSession with a valid access token:
	
	
    function getUserFB($profile_id,$type="all"){

      FacebookSession::setDefaultApplication('476476699176242', '174386d2f46e1fabb3dadb1090da4b39');

    	FacebookSession::enableAppSecretProof(false);
      
      $session = new FacebookSession('CAAGxWmBl7TIBAIKqhOXnZAcMZB1fERN7ZCHhxZCVc1ZAK6N7glRb8ia2WcZBkzcWhO5vGSSyr8z1AWclj3CusYoK7v3WInxj3sk3khrZBUZCmZAGkoIXAJMwFoCBr2ELZCueGT4Tk76WQrYZBEg239NZCxQxzkJEm4WFDR85Rab9K1gTTUGrIPx45c52UfvZCaCVF5VckmVupexxUmAMKOf5EO608');
     // $request = new FacebookRequest($session, 'GET', '/me');
      // $response = $request->execute();
      // $graphObject = $response->getGraphObject();
    //   $session = new FacebookSession('1fc89210bcc967bbfacea34ce1f887da');
    	// get all events from page ex. /170064513039636/events?since=2010&until=now&&fields=cover,name,description,place
      //get acces token information user as well /me/accounts
    //   // Get the GraphUser object for the current user:

      //query to get all the public information
      //170064513039636?fields=cover,about,company_overview,mission,founded,emails,location,description,phone,category,posts.limit(5),events.limit(5).fields(cover,name,description,place).since(2014),photos.fields(picture,source),albums.limit(10).fields(name,photos.limit(10).fields(picture,source))

  		// /170064513039636?fields=cover,about,company_overview,mission,founded,emails,location,description,phone,category,posts.limit(5),events.limit(5).fields(cover,name,description,place).since(2014),photos.fields(picture,source),albums.limit(10).fields(name,photos.limit(10).fields(picture,source))&access_token=476476699176242|174386d2f46e1fabb3dadb1090da4b39
      
      $about="cover.fields(source),about,company_overview,mission,founded,description,category";
      $contact="emails,location,phone";
      $feed="posts.limit(5)";
      $event="events.limit(5).fields(cover,name,description,place).since(2014)";
      $gallery="photos.fields(picture,source),albums.limit(10).fields(cover_photo,name,type,description,photos.limit(10).fields(picture,source))";

      switch ($type) {
        case 'all':
          $_field="$about,$contact,$feed,$event,$gallery";
          break;
        case 'about':
          $_field="$about";
        break;
        case 'contact':
          $_field="$contact";
        break;
        case 'feed':
          $_field="$feed";
        break; 
        case 'event':
          $_field="$event";
        break; 
        case 'gallery':
          $_field="$gallery";
        break;         
        default:
          $_field="";
          break;
      }    

      

      try {
        $me = (new FacebookRequest(
          $session, 'GET', "/$profile_id?fields=$_field&access_token=476476699176242|174386d2f46e1fabb3dadb1090da4b39"
        ))->execute()->getGraphObject(GraphUser::className())->asArray();
        // echo $me->getName();
        return $me;
       

      } catch (FacebookRequestException $e) {
        // The Graph API returned an error
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();

      } catch (\Exception $e) {
        echo " with message: " . $e->getMessage();

        // Some other error occurred
      }

    }



	



}