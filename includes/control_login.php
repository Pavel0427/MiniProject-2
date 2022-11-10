<?php

//parsing an array container into an object
$info = (object)[];

//login
$data = false;

//here state all the info


// the ones above doesnt need to eb validated

//need some validation 
$data['email'] = $data_obj->email;

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

$Error ="";

// $data['pass'] = $data_obj->pass;
// if(empty($data_obj->pass)){
//     $Error .= "Please enter a password. <br>";
// }

//$password = $data_

//checks if the input emailis empty
if(empty($data_obj->email))
{
    $Error .="please enter a valid email. <br>";
}
 
//checks if the input password is not empty
if(empty($data_obj->pass))
{
    $Error .="please enter a valid password. <br>";
}

if ($Error == "") {
    $query = "select * from users where email = :email limit 1";
     $result  = $DB->read($query,$data);


    if (is_array($result)) {
        
        
        $result = $result[0];
        if($result->pass== $data_obj->pass){
            $info->message = "You have successfully login";
            $info->data_type ="info";
            echo json_encode($info);

            $_SESSION['id'] = $result->id;

        } else{
            $info->message = "Your password is incorrect";
            $info->data_type ="error";
            echo json_encode($info);
        }
  
        // $info->message = "Your profile was created successfully";
        // $info->data_type ="info";
        // echo json_encode($info);
 
    } else {
        
        $info->message = "Wrong email address";
        $info->data_type ="error";
        echo json_encode($info);
        
    }
}
else{
    //this wil output the error message
    $info->message = "An Error has occurred<br>" . $Error ;
    $info->data_type ="error";
    echo json_encode($info);
}

 