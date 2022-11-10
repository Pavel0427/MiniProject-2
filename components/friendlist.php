<?php 



    
    
    $myself = $_SESSION['id'];   //this gets the current logged in user and store it to variable
    
    // This gets all the data users in the table as long as it's not the current logged in user
    $sql = "select * from users where id !='$myself' limit 10"; 

    //calling the fucntion and storing it unto an empty array
    $myUsers = $DB->read($sql,[]);

    //this mydata will be return as an object message 
    $mydata  =   '
    <div class="text-center">';

    //createing a loop
    if(is_array($myUsers)){

        //this loops and show all users in the table
        foreach( $myUsers as $user){
            $mydata .= "
            <div id='contact' userid='$user->id' onclick='start_chat(event)' class='hover:scale-110 transition ease-in duration-150'><img src='' alt=''>
            <br>
            $user->email
            </img>
            </div>
            ";
        }
    }

    //closing
    $mydata .= '</div>';

    //$result = $result[0];
    
    $info->message = $mydata;
    $info->data_type ="friends";
    echo json_encode($info);
   
    die;

    $info->message = "No Contacts were found";
    $info->data_type ="error";  
    echo json_encode($info);
    
?>
