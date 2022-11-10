

function _(element)
{
    return document.getElementById(element);
}

//-------------------------------- COLLECTING THE USER INPUT --------------------------------

// grabs the sign up button in html sign up page
var signup_button = _("signup_button");
//giving it an event
signup_button.addEventListener("click", collect_data);

//the function that will execute the event of the signup button  
function collect_data ()
{
  signup_button.disabled = true;
  signup_button.value = "Loading...Please wait...";

  // getting the form
  var myform = document.getElementById("myform");

  //declaring an object container
  var data = {};
    var inputs = myform.
        
        
        getElementsByTagName("INPUT");

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
    
  send_data(data, "signup");

}

function send_data (data, type)
{

  
    var xml = new XMLHttpRequest();

    xml.onload = function ()
    {
        if (xml.readyState == 4 || xml.status == 200) {
          handle_result(xml.responseText);
          //enabling the button
          signup_button.disabled = false;
          signup_button.value = "Sign Up";
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
function handle_result (result)
{
  var data = JSON.parse(result);

  if (data.data_type == "info")
  {
    window.location = "login.php";
  } else {
    var error = _("error");
    error.innerHTML = data.message;
    error.style.display = "block";
  }
}


//-------------------------------- END Handiling the results  --------------------------------




