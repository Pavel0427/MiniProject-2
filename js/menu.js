var main = _("main");
             

          
var inbox = _("msgs");
var friends = _("frnds");
var settings = _("sets");
// inbox.addEventListener("click",  function (){
//   pagestate = "components/inbox.php"
//   var ajax = new XMLHttpRequest();
//   ajax.onload = function(){
      
//       if(ajax.status == 200||ajax.readyState == 4)
//       {
//           main.innerHTML = ajax.responseText;
//       }


//   }
//   ajax.open("POST",pagestate,true);
//   ajax.send();

//   tryme.innerHTML = pagestate;
// }
// );
// friends.addEventListener("click",  function (e){
//    pagestate = "components/friendlist.php"
//   var ajax = new XMLHttpRequest();
//   ajax.onload = function(){
      
//       if(ajax.status == 200||ajax.readyState == 4)
//       {
//           main.innerHTML = ajax.responseText;
//       }


//   }
//   ajax.open("POST",pagestate,true);
//   ajax.send();

//   tryme.innerHTML = pagestate;

// }
// );

friends.addEventListener("click", get_friends);
inbox.addEventListener("click", get_inbox);
sets.addEventListener("click", get_settings);

function get_friends (e)
{
    get_data({}, "friends");
}
function get_inbox (e)
{
    get_data({}, "inbox");
}
function get_settings (e)
{
    get_data({}, "settings");
}
function send_message (e)
{

    var message_text = _("message_text");

    //this will alert the user that it is a blank message
    if (message_text.value.trim() == "") {
        alert("please type something to send");
        return;
    }

    // alert(message_text.value);

    get_data({

        message: message_text.value.trim(),
        userid :CURRENT_CHAT_USER         

    }, "send_message");
}

setInterval(function ()
{
      
 
    if (CURRENT_CHAT_USER != "") {
        get_data({
            userid: CURRENT_CHAT_USER
        }, "inbox");
    }
  


}, 10000);