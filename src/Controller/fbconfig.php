<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
<<<<<<< HEAD
FacebookSession::setDefaultApplication( 'Your APP ID','Your APP Secret' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://demos.krizna.com/1353/fbconfig.php' );
=======
FacebookSession::setDefaultApplication( '1746281588966450','030fc1337edb02a87f6b564a8043448a' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper("fbconfig.php" );
>>>>>>> 3bd11d06a6a3ac61ee9522845eed343812e1c1c5
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
<<<<<<< HEAD
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
    /* ---- header location after session ----*/
  header("Location: index.php");
=======
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
    /* ---- header location after session ----*/
  header("Location: http://localhost:8765/users/loginfacebook");
>>>>>>> 3bd11d06a6a3ac61ee9522845eed343812e1c1c5
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>