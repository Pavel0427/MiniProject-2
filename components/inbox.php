<?php


$arr["id"] = "null";

if(isset($data_obj->find->userid)){
    $arr["id"] = $data_obj->find->userid;
} 

//Refreshing
$refresh = false;

if($data_obj->data_type== "inbox_refresh")
{
    $refresh = true;
}


 
$sql = "select * from users where id = :id limit 1";

//getting the users- data
$result = $DB->read($sql, $arr);

if(is_array($result)){

    //userfound
   $row = $result[0];
   $messages_text = "";
   
   $prompter= "";
    // $messages .= message_received($row)  ;
    // $messages .= message_send($row)  ;

    
                            // $arr2['sender'] = $_SESSION['id'];
                            // $arr2['receiver'] = $arr['id']; 
   
                            //read from database
                                      
                            $dm['receiver'] = $arr["id"] ;
                            $dm['sender'] = $_SESSION["id"] ;
                            
                            $sql = "select * from messages where (sender = :sender && receiver = :receiver) || (sender = :receiver && receiver = :sender) order by id desc limit 10";
                            
                            //getting the conversation  data  
                            $result2 = $DB->read($sql, $dm);
                        
                            if (is_array($result2)) {

                                $result2 = array_reverse($result2);
                                foreach ($result2 as $data) {
                                    #.... 
                                    $myuser = $DB->get_user($data->sender);

                                    if ($_SESSION['id'] == $data->sender) {
                                        $messages_text .= message_send($data, $row);
                                    } else
                                        $messages_text .= message_received($data, $row);
                                }
                            }
 

 

      $mydata = inbox_styles() . "Inbox main <br> Previous Chats:<br>";
    if(!$refresh){

    $mydata .=  conlist_col($row);
    }


    
    $messages = message_holder($messages_text); 

    
    if(!$refresh){
    $prompter = message_prompt();
    }

   

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


    // $dm['receiver'] = $arr["id"] ;
    $dm['id'] = $_SESSION["id"] ;
    
    $sql = "select * from messages where (sender = :id  ||  receiver = :id ) group by msg_id order by id desc limit 10";
    
    //getting the conversation  data  
    $result2 = $DB->read($sql, $dm);
    
    $messages = "";

    if (is_array($result2)) {

        $result2 = array_reverse($result2);
        foreach ($result2 as $data) {
            #.... 
            $receiving_user = $data->sender; 
            if($data->sender == $_SESSION['id']){
              $receiving_user = $data->receiver;
            }
            $myuser = $DB->get_user($receiving_user);

            // if ($_SESSION['id'] == $data->sender) {
            //     $messages .= message_send($data, $row);
            // } else
            //     $messages .= message_received($data, $row);
            // </div> 

            // <div id='contact' userid='$myuser->id'  class='hover:scale-110 transition ease-in duration-150'> 
            // <div id ='active_contact'>
            // <img>$myuser->email<di v> </div>";
 
           
        }
        // $messages .= message_holder($result2);
    }
    $mydata = "inbox not main<br>Previous Chats:<br>";
    // $mydata .=  conlist_col($result2);

    $prompter = message_prompt();
    $info->friendlist = $mydata;
    $info->message = $messages;
    $info->prompter = $prompter;
    $info->data_type ="inbox";
    echo json_encode($info);

}

 

 
    
?> 