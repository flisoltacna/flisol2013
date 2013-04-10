<?php
session_start();
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

if(!$fbuser) 
{
    //new users get to see this login button
    $loginUrl = $facebook->getLoginUrl(array('scope' => $fbPermissions,'redirect_uri'=>$return_url));
    header('Location: '. $loginUrl);
}
else
{    
     //get user profile
     try {
        $user_profile = $facebook->api('/me');
        
        //list of user granted permissions
        $user_permissions = $facebook->api("/me/permissions"); 
      } catch (FacebookApiException $e) {
        echo $e;
        $fbuser = null;
      }
     
      //login url
      $loginUrl = $facebook->getLoginUrl(array('scope' => $fbPermissions,'redirect_uri'=>$return_url)); 
      
      // permission required to proceed
      $permissions_needed = explode(',',$fbPermissions); 
      
      //loop thrugh each permission
      foreach($permissions_needed as $per) 
      {
        //if more permission needed show login link
        if (!array_key_exists($per, $user_permissions['data'][0])) { 
            die('Necesitamos permisos adicionales para continuar, hacga click <a href="'.$loginUrl.'">aqui</a>!</div>');
        }
      }

}
$_SESSION['logged'] = 'yes';
?>

<script>
 try {
        window.opener.reDesign();
    } catch (err) {
        alert(err.description || err) //or console.log or however you debug
    }
    window.close(); 
</script>