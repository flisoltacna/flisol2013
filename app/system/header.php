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

$fbuser = $facebook->getUser();

 //get user profile
     try {
        $user_profile = $facebook->api('/me');
        
        //list of user granted permissions
        $user_permissions = $facebook->api("/me/permissions"); 
      } catch (FacebookApiException $e) {
        echo $e;
        $fbuser = null;
      }
     
?>
<div id="head_logotxt"><p>FLISOL Tacna</p></div>
<div id="menuHead"><p><?php echo $user_profile["name"]; ?> <a href="#" onclick="logOut(); return false;">[Salir]</a></p></div>