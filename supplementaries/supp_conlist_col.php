<?php
//conlist col means contact list in column format

function conlist_col($row){

    return "
        <div class='container flex flex-row mt-2 border-b border-slate-500'>
            <div class='container w-3/12'>
                <img id='profile_image' class=' h-16 w-16 px-1 py-2 ' src='images/ph-image.png' alt=''>
            </div>

            <div class='container flex flex-col w-8/12'>

                <span id='friendName' class='text-left px-2   mt-2 font-semibold'>$row->email</span>

                <span class='text-left px-2   '> Message is my last .....</span>
            </div>
 
        </div> ";
}