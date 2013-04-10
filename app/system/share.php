<?php
include('config.php');
// check if curl is enabled
if (!in_array  ('curl', get_loaded_extensions())){die('curl required!');} 

//include facebook SDK
include_once("inc/facebook.php"); 

//Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret,
   'fileUpload' => true,
));

//get facebook user
$fbuser = $facebook->getUser();

//get user profile
     try {
        $user_profile = $facebook->api('/me');
        
        //list of user granted permissions
        $user_permissions = $facebook->api("/me/permissions"); 
      } catch (FacebookApiException $e) {
        echo $e;
        $fbuser = null;
      };

  $post_url = '/'.$fbuser.'/photos';
	//	echo $fbuser;
  	$source = 'tmp/id_'.$fbuser.'.jpg';

        //posts message on page statues
        $msg_body = array('image'=>'@'.realpath($source),'message' => 'Crea tu tarjeta del FLISOL en: http://app.flisoltacna2013.info');


		if ($fbuser) {
      try {
            $postResult = $facebook->api($post_url, 'post', $msg_body );
            echo 'Imagen publicada!';
        } catch (FacebookApiException $e) {
        echo $e->getMessage();
      }
    }else{
     $loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
     header('Location: ' . $loginUrl);
    }
?>