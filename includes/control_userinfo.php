<?php

//parsing an array container into an object
$info = (object)[];

//login
$data = false;

//here state all the info
$data['id'] = $_SESSION['id'];

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


// $data['pass'] = $data_obj->pass;
// if(empty($data_obj->pass)){
//     $Error .= "Please enter a password. <br>";
// }

//$password = $data_

//checks if the input emailis empty
// if(empty($data_obj->email))
// {
//     $Error .="please enter a valid email. <br>";
// }
 
// //checks if the input password is not empty
// if(empty($data_obj->pass))
// {
//     $Error .="please enter a valid password. <br>";
// }
$Error ="";

if ($Error == "") {
    $query = "select * from users where id = :id limit 1";
     $result  = $DB->read($query,$data);


    if (is_array($result)) {
        
          
        $result = $result[0];
         
        $result->data_type ="user_info";
        echo json_encode($result);
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

 