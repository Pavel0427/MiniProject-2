 

<?php

//sessions 
session_start();



//stating an empty obkect container 
$info=(object)[];

require_once("classes/autoload.php");
$DB = new Database(); 

$raw_data = file_get_contents("php://input"); 
$data_obj = json_decode($raw_data);


//checking if loggen in if not it will return to loginpage
if(!isset($_SESSION['id']))
{

   if(isset($data_obj->data_type) && $data_obj->data_type !="login.php" && $data_obj->data_type =="signup.php"){
      //for login 
      $info->logged_in =  false;
      echo json_encode($info);
      die;
   
      // include_once "includes/control_login.php";
   }


   // echo json_encode($info);
    
}

 

//supplementaries 
include_once "supplementaries/all_supplement.php";


 
//Error Container
$Error = "";

 
// process the data
if(isset ($data_obj->data_type) && $data_obj->data_type =="signup"){
   sleep(0.5);
   include_once "includes/control-signup.php";
}else 
if(isset ($data_obj->data_type) && $data_obj->data_type =="login"){
   //for login 
   sleep(0.5);
   include_once "includes/control_login.php";
}else 

if(isset ($data_obj->data_type) && $data_obj->data_type =="user_info")
{
    include("includes/control_userinfo.php");
}
else 

if(isset ($data_obj->data_type) && $data_obj->data_type =="logout")
{
    include("includes/control_logout.php");
}
else 

if(isset ($data_obj->data_type) && $data_obj->data_type =="friends")
{
    include("components/friendlist.php");
}
else 

if(isset ($data_obj->data_type) && $data_obj->data_type =="inbox" ||  $data_obj->data_type =="inbox_refresh")
{
    include("components/inbox.php");
}
else 
 
if(isset ($data_obj->data_type) && $data_obj->data_type =="settings")
{
    include("components/settings.php");
}
else
if(isset ($data_obj->data_type) && $data_obj->data_type =="update_settings")
{
    include("includes/control_update_settings.php");
}
else
if(isset ($data_obj->data_type) && $data_obj->data_type =="send_message")
{
    // $info->message =  $data_obj;
    // echo json_encode($info);
  
    include("includes/control_send_message.php");
}


 

?>