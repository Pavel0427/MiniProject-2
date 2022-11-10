
 

//-------------------------------- COLLECTING THE USER INPUT --------------------------------

// grabs the sign up button in html sign up page

//giving it an event
 

//the function that will execute the event of the signup button  
function collect_data()
{
  var settings_button = _("settings_button");
  settings_button.disabled = true;
  settings_button.value = "Saving...Please wait...";

  // getting the form
  var myform = document.getElementById("myform");

  //declaring an object container
  var data = {};
    var inputs = myform.getElementsByTagName("INPUT");

  //putting the data into the container
  for (var i = inputs.length - 1; i >= 0; i--) {
    var key = inputs[i].name;

    //swtich statement

    switch (key) {
      case "email":
        data.email = inputs[i].value;
        break;

      case "pass":
        data.pass = inputs[i].value;
        break;
      }
    /*
           if(inputs[i].checked){
           case "username":
           data.username = inputs[i].value;
           break;
           }

           so on
        }*/
    }
    
  send_data(data, "update_settings");

}

function send_data (data, type)
{

  
    var xml = new XMLHttpRequest();

    xml.onload = function ()
    {
        if (xml.readyState == 4 || xml.status == 200) {
          handle_data_result(xml.responseText);
          //enabling the button
          settings_button.disabled = false;
          settings_button.value = "Update Profile";
        }
    }   
      
        // getting the data type
        data.data_type = type;
        var data_string = JSON.stringify(data);
        xml.open("POST", "api.php", true)
        xml.send(data_string);
   
}

//-------------------------------- END COLLECTING THE USER INPUT --------------------------------







//-------------------------------- Handiling the results  --------------------------------

//
 


//-------------------------------- END Handiling the results  --------------------------------




