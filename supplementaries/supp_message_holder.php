<?php

function message_holder($messages){

   return "
            
    <div id='messages_holder'   class=' bg-slate-200 flex flex-col' style='overflow-y:scroll;max-height:60% ;min-height:50%;'>" .
 
     $messages ."
 
     </div>
      ";
   
}