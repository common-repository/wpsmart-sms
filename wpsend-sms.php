<?php
/*
Plugin Name:wp-smart-sms
Plugin URI: http://asdbd.com/wpsmartsms
Description: This Plugin Helps for Sending SMS Using SMS Gateway. For more information Visit http://smartsms.asdbd.com/Login.aspx
Author: Rasel
Version: 1.0
Author URI: http://asdbd.com
*/?>

<?php
function Send_sms(){

     ?>
	     
            <div id="container"> 
                 <div id="header">
				            <div id="header_img"> <a href="http://smartsms.asdbd.com/Login.aspx" target="_blink" > <img src="<?php echo plugins_url()?>/wpsmart-sms/image/smsmela3.png"></a></div>
				            <div id="header_title"> SMART WP Sms</div>
     
				 </div>		
               <div id="form_body">				 
                <h2>Sending SMS with PHP</h1>  
               <form method="get" action="http://smartsms.co/SendTextMessage.aspx">
			   <label>Sender Id:</label> <input type="text" class="text" name="senderid" value="eMediaDesk" onload="if(value=='') value = 'Sender Id'" onblur="if(value=='') value = 'Sender Id'" 
                onfocus="if(value=='Sender Id') value = ''"/></br>
				<label>User Id:</label> <input type="text" class="text" name="uid" onblur="if(value=='') value = 'User Id'" 
                 onfocus="if(value=='User Id') value = ''"/></br>
				  <div id="image" style="display:none;position:absolute">
			      <img src="<?php echo plugins_url()?>/sms/image/loading.jpg" align="center">
			       </div>
				<label>Password: </label> <input type="password" class="text" name="pass" onblur="if(value=='') value = 'Password'" 
                  onfocus="if(value=='Password') value = ''"/></br>
				 
				<label>Contact No:</label> <input type="text" class="text" name="contact" onblur="if(value=='') value = 'Contact Number'" 
                  onfocus="if(value=='Contact Number') value = ''" /></br>
				<label>Sms:</label><textarea name="sms" onKeyDown="limitText(this.form.sms,this.form.countdown,250);" 
                   onKeyUp="limitText(this.form.sms,this.form.countdown,250);"id="textarea"></textarea></br>
                <div id ="char_box">
				<font size="1">(Maximum characters:250)<br>
               You have <input readonly type="text" name="countdown" id="countdown" size="3" value="250"> characters left.</font>
				</div>
				
				<input type="button" value="submit" onclick="sendSMS()"/>
				 
				</form>
				</div>
				
				<div id="footer">
				  <h5>@copyright <a href="http://www.asdbd.com" target="_blink"> Advanced Software Development</a></h5>
				</div>
			</div>
		
    
	  
  <?php
  $username= $_POST['uid'];
  $password = $_POST['pass'];
  $contact = $_POST['contact'];
  $sms = $_POST['sms'];
  $senderid = $_POST['senderid'];


if ((empty($username)) || (empty($password)) || (empty($contact))|| (empty($sms))|| (empty($senderid)))
   {
  
     header ("Location: sms_error.php");
   }
   else
      echo "Messege is Sucessfully Send";
}

add_action('admin_menu','sms_admin_menu');




add_action( 'wp_enqueue_script', 'load_jquery' );
add_action( 'admin_enqueue_script', 'load_jquery' );
function load_jquery() {
	
    wp_enqueue_script( 'jquery' );
}
add_action('init', 'register_script');
function register_script() {
	wp_deregister_script( 'jquery' );
	wp_register_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',false,null);
    wp_register_script( 'custom_script', plugins_url('/js/custom_script.js', __FILE__));
    wp_register_style( 'new_style', plugins_url('/css/style.css', __FILE__), false, '1.0.0', 'all');
}


add_action('wp_enqueue_scripts', 'enqueue_style');
add_action('admin_enqueue_scripts', 'admin_enqueue_style');

function enqueue_style(){

   wp_enqueue_script('custom_script');
  
   }
function admin_enqueue_style(){

        wp_enqueue_script('custom_script');
         wp_enqueue_style( 'new_style' );
  }
   




  


function sms_admin_menu()
{
	
	add_menu_page( 'SMS Settings', 'Smart SMS', 'manage_options', 'sms', 'sms_settings');
	
	add_submenu_page( 'sms', 'Sent SMS', 'Sent Smart SMS', 'manage_options', 'sent-sms', 'sms_sent');
	add_submenu_page( 'sms', 'Send SMS', 'Send Smart SMS', 'manage_options', 'send-sms','Send_sms');
}
add_shortcode( 'sms', 'Send_sms' );
?>
