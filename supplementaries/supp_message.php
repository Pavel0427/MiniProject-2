<?php


//messages

function message_received($data,$row)
{
    return 
    "
    
    <div class='my-4 mt-4 bg-blue-200'  id='message_left'>
    <div>    </div>
    <img src='images/ph-image.png'>
    <span class='font-bold text-md'>$row->email</span>
    <br>  $data->message
    <br>
    <span class='text-xs text-gray-600'>".date("jS M Y H:i:s a",strtotime($data->date))."</span>
 
    </div> 

    ";
}

function message_send($data,$row)
{ 
    return 
    "
    
    <div class='my-4 mt-4'id='message_right'>
    <div>    </div>
    <img src='images/ph-image.png'>
    <span class='font-bold text-md'>$row->email</span>
    <br> $data->message
    <br>
    <span class='text-xs text-gray-600'>".date("jS M Y H:i:s",strtotime($data->date))."</span>
 
    </div> 

    ";
}

function message_prompt( )
{ 
    return "
    
    <div class='h-[4rem] bg-slate-100 text-black text-xl border-t border-l border-gray-300'>
                


                <label for='message_file'> 
                   <div class='inline-block text-white px-2 py-3rounded-lg w-1/12'>
                        <svg  xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Layer_1' x='0px'
                        y='0px' width='25' height='25' viewBox='0 0 122.877 112.531'
                        enable-background='new 0 0 122.877 112.531' xml:space='preserve'>
                        <g>
                            <path fill-rule='evenodd' clip-rule='evenodd'
                                d='M8.872,8.869L8.872,8.869C-2.956,20.694-2.958,40.039,8.87,51.864L53.433,96.43 c4.873,0.274,7.517-1.769,7.055-7.055L16.287,45.172c-7.945-7.945-7.945-20.941,0-28.887l0,0 c7.943-7.942,20.943-7.945,28.889-0.002c21.27,21.27,42.542,42.543,63.807,63.81c5.035,5.032,5.318,13.691,0.279,18.73l0,0 c-5.035,5.036-13.656,4.721-18.693-0.315C74.424,82.364,58.402,66.342,42.256,50.197c-2.235-2.235-2.349-6.006-0.113-8.245l0,0 c2.234-2.236,6.009-2.12,8.245,0.113L79.092,70.77c5.201,0.411,7.434-2.138,7.182-7.181L57.569,34.884 c-6.188-6.188-16.308-6.188-22.492-0.002l0,0c-6.19,6.188-6.184,16.315-0.002,22.496l19.662,19.664l9.269,9.27l19.201,19.199 c8.977,8.978,24.23,9.54,33.207,0.56c8.982-8.981,8.422-24.23-0.559-33.21L87.387,44.392v0.002L51.862,8.869 C40.039-2.958,20.693-2.954,8.872,8.869L8.872,8.869z' />
                        </g>
                        </svg>
                    </div>
                    <input type='file' id='message_file' class='hidden' name='file'>
                </label>

                <input type ='text' autocomplete='off' id='message_text' onkeyup='enter_send(event);' placeholder='Send a message...' class='w-9/12 ml-4' >
                <input type='button' value='Send' class='bg-slate-700 text-white px-2 py-1 rounded-lg w-1/12' onclick='send_message(event)' >
    </div>
    
    ";
    
}
