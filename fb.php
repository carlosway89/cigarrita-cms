<?php

session_start();

define('FACEBOOK_SDK_V4_SRC_DIR', '/resource/facebook-php-sdk-v4/src/Facebook/');
require $_SERVER['DOCUMENT_ROOT'].'/resource/facebook-php-sdk-v4/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

// FacebookSession::setDefaultApplication('476476699176242','174386d2f46e1fabb3dadb1090da4b39');

// $session = new FacebookSession('CAACEdEose0cBALP8IvvW4vah1oeEPg7kIR1D8h9vJZCWv9GdaGKtD4myPIikE5w2O7IcjRdOpRVf6hjB8rw3nL4ZCJ5SxnDxmD0Lu5q8CjydZCbQsKVEZCT6BsC6SgIZAnZCmqZA6ipZCq8IEVVbZBBfQwKe7yr3a8Nx6xTcYLBbMOgYbKZCfBqAAA81djDBbSLgDQRhkLSrRPxbk1VhrM7Nug');

// // Get the GraphUser object for the current user:

// try {
//   $me = (new FacebookRequest(
//     $session, 'GET', '/me'
//   ))->execute()->getGraphObject(GraphUser::className());
//   echo $me->getName();
// } catch (FacebookRequestException $e) {
//   // The Graph API returned an error
// } catch (\Exception $e) {
//   // Some other error occurred
// }

echo 1;
?>