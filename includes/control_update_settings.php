<?php



//parsing an array container into an object
$info = (object)[];

 
//signup
$data = false;

//here state all the info
 
//sets up the id to the current login user
$data['id'] =  $_SESSION['id'];
// the ones above doesnt need to eb validated

//need some validation 
// $data['email'] = $data_obj->email;

//this validates if the email is empty or not
// if (empty($data_obj->email)) {
//     $Error .= "Please enter an email address. <br>";
// } else {
//     //this validates if the email characters is within the allowed range
//     if (strlen($data_obj->email) < 5 || strlen($data_obj->email) > 200){
//         $Error .= "Please enter an email address with characters between 5 to 200 long. <br>";
//     }
 
//     //check the email format
//     if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $data_obj->email)){
//         $Error.= "You have entered an invalid email address.";
//     }

// }


$data['pass'] = $data_obj->pass;
if(empty($data_obj->pass)){
    $Error .= "Please enter a password. <br>";
}
 
//$password = $data_



//Result sections 

if ($Error == "") {
    $query = "update users set pass = :pass  where id = :id LIMIT 1";
     $result  = $DB->write($query,$data);


    if ($result) {
        $info->message = "Your information has been updated successfully!";
        $info->data_type ="update_settings";
        echo json_encode($info);
 
    } else {
        
        $info->message = "your profile was not dave duet an error!";
        $info->data_type ="update_settings";
        echo json_encode($info);
        
    }
}
else{
    //this wil output the error message
    $info->message = $Error;
    $info->data_type ="update_settings";
    echo json_encode($info);
}