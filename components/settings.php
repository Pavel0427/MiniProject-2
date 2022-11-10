
<?php 
    //Query 
    $sql = "SELECT * FROM users WHERE id = :id LIMIT 1 ";
    $id =  $_SESSION['id'];
    $data = $DB->read($sql,['id'=>$id]);
    $mydata  =  "";
    if(is_array($data)){
        // getting the first item only
        $data = $data[0];


    
    $mydata  .=  " 

    <style>
    
    .dragging {
     border:dashed 2px #aaa;
 
    }

    </style>
    
    <div class='container mx-12 my-4 w-6/12 h-[27rem] bg-white flex flex-col  justify-center object-center rounded-lg '>
    <h1 class='mt-2  text-bold text-3xl  text-sky-500'> Profile Settings</h1> <br>
    <img ondragover='dragnDrop(event) 'ondragleave='dragnDrop(event)' ondrop='dragnDrop(event)' id='profile_image' class='   mt-2' src='images/ph-image.png' style='height:100px;width:100px;'alt=''>
    <label for='upload_photo' id='upload_photo_button' class='bg-slate-700  w-32 px-2 my-2 mx-1 py-1 rounded-md font-semibold text-white'>Change Image</label>
    <input name='upload_photo' type='file' value='Upload Photo' id='upload_photo' class='hidden' onchange='upload_display_photo(this.files)'>
     
       <form id='myform' class='py-2 px-2'>
    <label for='pass'>Change your Password:</label><br>
    <input class='bg-slate-200 bg-opacity-100 rounded-sm' type='text' name='pass' id='pass' value=".$data->pass.">
    <br>
    <br>
    <input id='settings_button' type='button' value='Update Profile' class='bg-slate-700 text-md font-semibold rounded-lg px-2 py-1 text-white' onclick='collect_data(event);'>
    <form>
    </div>
    <script src='js/settings.js' type='text/javascript'>
    </script>
    <script src='js/home.js' type='text/javascript'>
    </script>
    "
    ;



    //$result = $result[0];
    
    $info->message = $mydata;
    $info->data_type ="friends";
    echo json_encode($info);
   

}else{
    $info->message = "No Contacts were found";
    $info->data_type ="error";  
    echo json_encode($info);
}
?>