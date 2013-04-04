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
   @unlink($temp_folder.$fbuser.'.jpg');
    ///if(!copy('http://ikeylive.heliohost.org/flisol/img.php?user='.$fbuser,$temp_folder.$fbuser.'.jpg'))
    if(!copy('http://flisol.freetzi.com/img.php?user='.$fbuser,$temp_folder.$fbuser.'.jpg'))
    {
        die('Could not copy image!');
    }

    ##### start generating Facebook ID ########
    $dest = imagecreatefrompng($image_id_png); // source id card image template
    $src = imagecreatefromjpeg($temp_folder.$fbuser.'.jpg'); //facebook user image stored in our temp folder
    
    imagealphablending($dest, false); 
    imagesavealpha($dest, true);
    
    //merge user picture with id card image template
    //need to play with numbers here to get alignment right
    imagecopymerge($dest, $src, 308, 22, 0, 0, 115, 115, 100);     
    //colors we use for font
    $facebook_blue = imagecolorallocate($dest, 81, 103, 147); // Create blue color
    $facebook_grey = imagecolorallocate($dest, 74, 74, 74); // Create grey color
    
    //Texts to embed into id card image template
    $txt_user_id        = $fbuser;
    $txt_user_name      = isset($user_profile['name'])?$user_profile['name']:'No Name';
    $txt_user_gender    = isset($user_profile['gender'])?$user_profile['gender']:'No gender';
    $txt_user_hometown  = isset($user_profile['hometown'])?$user_profile['hometown']['name']:'Unknown';
    $txt_user_birth     = isset($user_profile['birthday'])?$user_profile['birthday']:'00/00/0000';
    $user_text          = 'Your source for Google+ and hangout graphics for free.';
    $txt_credit         = 'Generated using www.saaraan.com';
    
    //format birthday, not showing whole birth date!
    $fb_birthdate = date($txt_user_birth);
    $sort_birthdate = strtotime($fb_birthdate);
    $for_birthdate = date('d M', $sort_birthdate);

    imagealphablending($dest, true); //bring back alpha blending for transperent font
    
   //imagettftext($dest, 10, 0, 170, 190, $facebook_grey , $font, $txt_user_id); //Write user id to id card
    imagettftext($dest, 15, 0, 95, 151, $facebook_grey, $font, $txt_user_name); //Write name to id card
    //imagettftext($dest, 15, 0, 25, 204, $facebook_grey, $font, $txt_user_gender); //Write gender to id card
    imagettftext($dest, 15, 0, 135, 190, $facebook_grey, $font, $txt_user_hometown); //Write hometown to id card
   // imagettftext($dest, 15, 0, 135, 228, $facebook_grey, $font, $for_birthdate); //Write birthday to id card
    imagettftext($dest, 15, 0, 135, 228, $facebook_grey, $font, $txt_user_birth); //Write birthday to id card
    //imagettftext($dest, 10, 0, 25, 215, $facebook_grey, $font, $user_text); //Write custom text to id card
    //imagettftext($dest, 8, 0, 25, 240, $facebook_blue, $font, $txt_credit); //Write credit link to id card
    
    imagepng($dest, $temp_folder.'id_'.$fbuser.'.jpg'); //save id card in temp folder

	//now we have generated ID card, we can display or post it on facebook
   // echo '<img src="tmp/id_'.$fbuser.'.jpg" >'; //display saved user id card
    
    /* or output image to browser directly
    header('Content-Type: image/png');
    imagepng($dest);
    */
  //  include('share.php');
	/*  //Post ID card to User Wall
        $post_url = '/'.$fbuser.'/photos';
		
        //posts message on page statues
        $msg_body = array(
        'source'=>'@'.'tmp/id_'.$fbuser.'.jpg',
        'message' => 'interesting ID';
        );
		$postResult = $facebook->api($post_url, 'post', $msg_body );
	*/

	
    imagedestroy($dest);
    imagedestroy($src);   
?>
<div id="contenido_logged">


<img src="system/tmp/id_<?php echo $fbuser; ?>.jpg"  /><br />
<button class="thoughtbot" onclick="uploadImage(); return false;">Publicar!</button>


</div>