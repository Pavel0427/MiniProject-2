
  var CURRENT_CHAT_USER = "";

//--------------------------------  Log Out  --------------------------------

var logout = _("logout_button");

logout.addEventListener('click', logout_user);

function logout_user ()
{
  var answer = confirm("Are you sure you want ot logout?")
  if (answer) {
    get_data({}, "logout");
  }
}

//-------------------------------- END Log Out  --------------------------------
//-------------------------------- Loader --------------------------------

var load_toggle = _("load_toggler");
// load_toggle.style.opacity= "0";
 
// console.log(load_toggle.innerHTML);

//--------------------------------  End Loader  --------------------------------
//--------------------------------  Get Data  --------------------------------

function get_data (find, type)
{
  
  //setting up our ajax 
  var xml = new XMLHttpRequest();
  
  xml.onload = function(){
   
    if (xml.readystate == 4 || xml.status == 200) {

      // load_toggle.style.opacity = "1";
      handle_data_result(xml.responseText, type);
    }

  }
  
  //our data object container 
  var data = {};
  data.find = find;
  data.data_type = type;
  var data = JSON.stringify(data);
  
  xml.open("POST", "api.php", true);
  xml.send(data);

}

function handle_data_result (result, type)
{
 
 
  if (result.trim() != "") {
    var obj = JSON.parse(result);
    //searching for
    
    //equivalent to set 
    if (typeof(obj.logged_in) != "undefined" && !obj.logged_in) {
      //if the user is not logged in page will go to login page
      window.location = "login.php";
    } else {
      switch (obj.data_type) {
        
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

        case "user_info":
          var username = _("username");
          username.textContent = obj.email;
          break;
        
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx        
        
        case "friends":
          var left_panel = _("left_panel"); 
          var right_panel = _("right_panel");   
          var display_friends = _("display_friends");   
          
 
 
            //hide the panels
            left_panel.style.display = 'none';
            right_panel.style.display = 'none';
          
            //show the display container
            display_friends.style.display = 'block';
 
 
 
          display_friends.innerHTML = obj.message;

          break;
        
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx        
        
        case "inbox_refresh":
          var messages_holder_parent = ("messages_holder_parent");
          // messages_holder.innerHTML = obj.message; 
          
          messages_holder_parent.innerHTML = obj.message;
          // var left_panel = _("left_panel"); 
          // var right_panel = _("right_panel");   
          // left_panel.style.display = 'block';
          // left_panel.innerHTML = obj.friendlist;
          // right_panel.innerHTML = obj.message;
          break;

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx          
          

        case "inbox":
          
          var left_panel = _("left_panel"); 
          var right_panel = _("right_panel");   
          var messages_holder_parent = _("messages_holder_parent");
          var prompt_holder = _("prompt_holder");
          var display_friends = _("display_friends"); 
          //
          //first hide the display_friends
          display_friends.style.display = 'none';
           //show the panels
          left_panel.style.display = 'block';
          right_panel.style.display = 'block';
          left_panel.innerHTML = obj.friendlist;
          messages_holder_parent.innerHTML = obj.message;
          prompt_holder.innerHTML = obj.prompter;
          // right_panel.innerHTML = obj.message;

          var messages_holder = _("messages_holder");
          
          setTimeout(function ()
          {
            messages_holder.scrollTo(0, messages_holder.scrollHeight);
            var message_text = _("message_text");
            message_text.focus();
           },0);
          break;
        
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        
        case "settings":
          var mainContent = _("main");  
          mainContent.innerHTML = obj.message;
          break;
        
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx        
        
        case "update_settings":
         
          alert(obj.message);
          get_data({}, "user_info");
          get_settings(true);

          break;
        
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx        
        
        case "send_message":
         
          alert(obj.message);
 

          break;
         
      };
    }
    
  }
}

//goignt o run 
get_data({}, "user_info");



//--------------------------------  END Get Data  --------------------------------



//--------------------------------  Upload Image   --------------------------------

function upload_display_photo(files)
{
  //this is an array 
 
 

  var upload_photo_button = _("upload_photo_button");
  upload_photo_button.disabled = true;
  upload_photo_button.innerHTML = "Uploading....";
    
 //new form obj
  var myForm = new FormData();
  var xml = new XMLHttpRequest();


    xml.onload = function ()
    {
      if (xml.readyState == 4 || xml.status == 200) {
          
        alert(xml.responseText);
          //refreshing
        get_data({}, "user_info");
        get_settings(true);
        
       
          //enabling the button
          upload_photo_button.disabled = false;
          upload_photo_button.innerHTML = "Upload Photo";
        }
    }   
      
        myForm.append('file', files[0]);
        // getting the data type
        
       myForm.append('data_type', "upload_display_photo");

    
        // var data_string = JSON.stringify(data); 
        
        // sending and sending location
        xml.open("POST", "includes/control_uploader.php", true);
        xml.send(myForm);

 }

//--------------------------------  END Upload Image  --------------------------------
 


//--------------------------------  Drag N Drop   --------------------------------
 
function dragnDrop(e)
{ 
  console.log(e.type);

  if (e.type == "dragover") {

    e.preventDefault();
    e.target.className = "dragging";

  }
  else if (e.type == "dragleave") {
    e.preventDefault();
    e.target.className = ""; 
   
  }
  else if (e.type == "drop") {
    e.preventDefault();
    e.target.className = "";
    upload_display_photo( e.dataTransfer.files);

   
  } 
  else {
    e.target.className = "";
  }



}

//--------------------------------  End Drag N Drop   --------------------------------



//--------------------------------  Start Chat   --------------------------------

function start_chat (e)
{
 
  var userid = e.target.getAttribute("userid");
  if (e.target.id == "") {
      userid = e.taget.parentNode.getAttribute("userid");
  }
   CURRENT_CHAT_USER =  userid; 
  
 
  get_data({
    userid: CURRENT_CHAT_USER
  }, "inbox")
 
}


 //--------------------------------  End  Start Chat    --------------------------------

//--------------------------------  Press Enter to sent --------------------------------

function enter_send(event) 
{
 
  if (event.keyCode == 13) {
    {
      send_message(event);
    }
  }
   
  // var userid = e.target.getAttribute("userid");
  // if (e.target.id == "") {
  //     userid = e.tagert.parentNode.getAttribute("userid");
  // }
  //  CURRENT_CHAT_USER =  userid; 
  
  // var friendlist = _("frnds");
  // get_data({
  //   userid: CURRENT_CHAT_USER
  // }, "inbox")
 
}


 //--------------------------------  End Press Enter to sent  --------------------------------

setInterval(function ()
{
  if (CURRENT_CHAT_USER != "")
  {
    get_data({ userid: CURRENT_CHAT_USER }, "inbox_refresh");  
  }
}, 5000);