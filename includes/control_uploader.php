<?php
 
session_start();
require_once("classes/autoload.php");
$DB = new database(); 

$info = (object)[];
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

//know the data type first
$data_type = "";
if(isset($_POST['data_type'])){
    $data_type = $_POST['data_type'];
}

// print_r($_POST);
$destination ="";
if(isset($_FILES['file']) && $_FILES['file']['name'] != "" ){

        if($_FILES['file']['error'] == 0){

        //validation is done
        $folder = "../uploads/";

        if(!file_exists($folder)){
            //then create a new folder
            mkdir($folder,0777,true);
        }
        $destination = $folder . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],$destination);

        $info->message = "Your photo has been uploaded successfully";
        $info->data_type = $data_type;
        echo json_encode($info);
    }


};

//making sure it was a display photo upload




if($data_type=="upload_display_photo"){

    if($destination != ""){
        //save to database
        $id = $_SESSION['id'];
        $query = "update users set image = '$destination' where id = '$id' limit 1";
        $DB->write($query,[]);
    }

}



/*
   $_FILES
   Reefrence
   Array
   (
    [file] ->Array (
        [name] => filename.jpg
        [type] =>  image/jpeg
        [tmp_name] => C:\xampp\tmp\php8FB2.tmp
        [error] => 0;
        [size] => 29157
    )
   )
   
   $_POST
   Array(
     
    [data_type] => change_profile_image  

   )
*/