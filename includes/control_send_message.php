<?php

use function PHPSTORM_META\map;

//This sets the array to null
$arr["id"] = "null";

//
if(isset($data_obj->find->userid)){
$arr["id"] = $data_obj->find->userid;
}else
{

}
$sql = "select * from users where id = :id limit 1";


 

//Refreshing
$refresh = false;

if($data_obj->data_type== "inbox_refresh")
{
    $refresh = true;
}

//getting the users- data
$result = $DB->read($sql, $arr);

if(is_array($result)){

 
$mydata= "";
$prompter= "";

    $arr['message'] = $data_obj->find->message;
    $arr['date'] = date("Y-m-d H:i:s");
    $arr['sender'] = $_SESSION['id'];
 
    $arr['msg_id'] =   get_random_string_max(60);

        $arr2['sender'] = $_SESSION['id'];
        $arr2['receiver'] =$arr['id'];

        $sql = "select * from messages where (sender = :sender && receiver = :receiver) || (sender = :receiver && receiver = :sender) limit 1";

        $result2 = $DB->read($sql, $arr2);
        
        if(is_array($result2)){
            $arr['msg_id'] = $result2[0]->msg_id;
        }
   
    
  
 
    $query = "insert into messages (sender, receiver, message, date, msg_id) values (:sender, :id, :message, :date, :msg_id)";
    $DB->write($query,$arr);
    //userfound
    $row = $result[0];
    $messages ='';
    // $messages .= message_received($row)  ;

              //read from 
                // $arr2 = false;  
                //display messages array
                $dm['msg_id'] = $arr['msg_id'];
                // $arr2['sender'] = $_SESSION['id'];
                // $arr2['receiver'] = $arr['id']; 
                
                $sql = "select * from messages where msg_id = :msg_id order by id desc limit 10";
                //getting the conversation  data  
                $result2 = $DB->read($sql, $dm);

                if(is_array($result2)){
                
                   $result2 = array_reverse($result2);
                   foreach($result2 as $data){
                    #.... 
                    $myuser = $DB->get_user($data->sender);

                    if($_SESSION['id'] == $data->sender){
                        $messages .= message_send($data,$row);
                    }else
                        $messages .= message_received($data,$row);
                   
                   }
                }

    // $messages .= message_send($row)  ;


//     $mydata  =  inbox_styles() . " 

//     <div class=' flex flex-row  h-full 'style='overflow-y:hidden'>
    
//          " . conlist_col($row) . "
     
//         <div id='messages_holder_parent' class='flex flex-col  w-9/12  '> 
            
//             ". message_holder($messages) ."

//             <div class='h-[4rem] bg-slate-100 text-black text-xl border-t border-l border-gray-300'>
                
//             ". message_prompt(). "

//             </div>    
//         </div>    
//     </div>    

// ";


// $mydata  =   "contact list";
    
// $messages = "message goes here"  ;

//     $info->friendlist = $mydata;
//     $info->message = $messages;
//     $info->data_type ="inbox";
//     echo json_encode($info);


if(!$refresh){
$mydata = inbox_styles() . "Previous Chats:<br>";
$mydata .=  conlist_col($row);
$prompter = message_prompt();
}


$messages .= message_holder($messages); 


$info->friendlist = $mydata;
$info->prompter = $prompter;
$info->message = $messages ;

$info->data_type ="inbox";
if($refresh){
    $info->data_type ="inbox_refresh";
}
echo json_encode($info);

    
}else {
    //user not found
    $info->message = "The user were not found";
    $info->data_type ="inbox";  
    echo json_encode($info);
}



    
  
    //$result = $result[0];
 
   
    die;

    // $info->message = "No Contacts were found";
    // $info->data_type ="error";  
    // echo json_encode($info);
    

    //function which is used for generating message id
    function get_random_string_max($length){
        //the parameters is used as a seed

        //
        $array =array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

        $text ="";

        $length = rand(4,$length);
        
        for($i=0; $i<$length;$i++){
            $random = rand(0,61);
            $text .= $array[$random];
        }

        return $text;
    }
    
?>