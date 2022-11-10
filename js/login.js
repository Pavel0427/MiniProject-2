

function _(element)
{
    return document.getElementById(element);
}

//-------------------------------- COLLECTING THE USER INPUT --------------------------------

// grabs the login button in html login page
var login_button = _("login_button");
//giving it an event
login_button.addEventListener("click", collect_data);

//the function that will execute the event of the login button  
function collect_data (e)
{
  e.preventDefault();
  login_button.disabled = true;
  login_button.value = "Loading...Please wait...";

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
    
  send_data(data, "login");

  
}

function send_data (data, type)
{
 
    var xml = new XMLHttpRequest();

    xml.onload = function ()
    {
        if (xml.readyState == 4 || xml.status == 200) {
          handle_result(xml.responseText);
          //enabling the button
          login_button.disabled = false;
          login_button.value = "Login ";
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
    window.location = "home.php";
  } else {
    var error = _("error");
    error.innerHTML = data.message;
    error.style.display = "block";
  }
}


//-------------------------------- END Handiling the results  --------------------------------




