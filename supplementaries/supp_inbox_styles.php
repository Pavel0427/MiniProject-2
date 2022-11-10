<?php

function inbox_styles()
{
    return "
    
    <style>

    #message_left{
     height:90px;
     margin:10px;
     // border:solid thin #aaa;
     padding:2px;
     padding-right:8px;
     background-color:#eee;
     color:#444;
     float:left;
     box-shadow:0px 0px 10px #aaa;
     position:relative;
     width:60%;
     border-bottom-left-radius:50%;
     min-width:20%;
    }
    #message_left img{
    
     width:70px;
     height:70px;
     float:left;
     margin:2px;
     border-radius:45%;
     border:solid 2px white;
      
     }
    #message_left div {
    
     width:20px;
     height:20px;
     background-color:pink;
     border:solid 2px white;
     border-radius:50%;
     position:relative;
     left: -75px;
     top:0px;
     display:inline-block;
  
     }
 
     
    #message_right{
     height:90px;
     margin:10px;
     // border:solid thin #aaa;
     padding:2px;
     padding-right:8px;
     background-color:#eee;
     color:#444;
     float:right;
     box-shadow:0px 0px 10px #aaa;
     position:relative;
     width:60%;
     border-bottom-right-radius:50%;
     min-width:20%;
      
    }
    #message_right img{
    
     width:70px;
     height:70px;
     float:right ;
     margin:2px;
     border-radius:45%;
     border:solid 2px white;
      
     }
    #message_right div {
    
     width:20px;
     height:20px;
     background-color:pink;
     border:solid 2px white;
     border-radius:50%;
     position:relative;
     right: -185px;
     top:0px;  
     display:inline-block;
     }
  
    
  
 
    </style>

    ";
}