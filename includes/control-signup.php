<?php

//parsing an array container into an object
$info = (object)[];

//signup
$data = false;

//here state all the info
$data['id'] = $DB->generate_id(2);

// the ones above doesnt need to eb validated

//need some validation 
$data['email'] = $data_obj->email;

//this validates if the email is empty or not
if (empty($data_obj->email)) {
    $Error .= "Please enter an email address. <br>";
} else {
    //this validates if the email characters is within the allowed range
    if (strlen($data_obj->email) < 5 || strlen($data_obj->email) > 200){
        $Error .= "Please enter an email address with characters between 5 to 200 long. <br>";
    }
 
    //check the email format
    if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $data_obj->email)){
        $Error.= "You have entered an invalid email address.";
    }

}


$data['pass'] = $data_obj->pass;
if(empty($data_obj->pass)){
    $Error .= "Please enter a password. <br>";
}

//$password = $data_

if ($Error == "") {
    $query = "insert into users(id, email,pass) values (:id, :email, :pass)";
     $result  = $DB->write($query,$data);


    if ($result) {
        $info->message = "Your profile was created successfully";
        $info->data_type ="info";
        echo json_encode($info);
 
    } else {
        
        $info->message = "your profile was not created unfortunately";
        $info->data_type ="error";
        echo json_encode($info);
        
    }
}
else{
    //this wil output the error message
    $info->message = $Error;
    $info->data_type ="error";
    echo json_encode($info);
}