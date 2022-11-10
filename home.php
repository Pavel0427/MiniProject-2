<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>My Chat</title>
 

    <link rel="stylesheet" href="css/custom.css">
    <style>
     

    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="overflow-x-hidden">

    <nav class=" flex flex-row py-2 bg-slate-700 text-white " style="height:10%;">
        <div id="load_toggler" class="loader_on">
                <section class=" absolute right-20">
            <!-- <section class=" container max-w-screen-lg mx-auto pb-10 flex justify-center align-center"> -->
            <img class="object-center h-12 w-12" src="ui/loading.gif" alt="">
            </section>
        </div>
        <span class="mx-2 py-2 open-slide" onclick="openSlideMenu();">
            <a href="#">
                <svg width="27" height="26">
                    <path d="M0,5 30,5" stroke="#ffff" stroke-width="5" />
                    <path d="M0,14 30,14" stroke="#fff" stroke-width="5" />
                    <path d="M0,23 30,23" stroke="#fff" stroke-width="5" />
                </svg>
            </a>
        </span>
        <ul class=" mx-2 py-2 text-xl ">
            <li class=" ">

                <a class="mx-1 " href="#">Home</a>
                <a class="mx-1 " href="#">About</a>
                <a class="mx-1 " href="#">Service</a>
                <a class="mx-1 " href="#">Contact</a>




            </li>
        </ul>
    </nav>

    <div id="side-menu" class="h-screen w-0 text-white   py-2 flex flex-col side-nav overflow-hidden fixed top-0 left-o z-10 bg-slate-700 ease-in-out duration-300">

        <a href="" class="btn-close absolute right-0 ease-in-out duration-300 " onclick="closeSlideMenu();">&times;</a>
        <br>
        <center>
            <img id="profile_image" class="h-32 w-32 " src="images/ph-image.png" alt="">
            <br>
            <p class="font-semibold text-2xl text-sky-300" id="username">Username</p>
            <div id="info">
                <span class="text-slate-200 text-xs mt-1">Join on October 2022</span><br>
                <div class="h-0.5 w-20 bg-white mt-2"></div>
                <br>
                <!-- <span>Bio Goes here</span> -->
            </div>
            <br>
            <a class="px-2 py-1 hover:bg-slate-700 hover:text-white ease-in-out duration-300" href="#" id="msgs">Messages</a> <br>
            <a class="px-2 py-1 hover:bg-slate-700 hover:text-white ease-in-out duration-300" href="#" id="frnds">Friends</a> <br>
            <a class="px-2 py-1 hover:bg-slate-700 hover:text-white ease-in-out duration-300" href="#" id="sets">Settings</a> <br>
            <button onclick="" id="logout_button" class="px-2 py-1 hover:bg-slate-700 hover:text-white ease-in-out duration-300" href="#">Logout</button> <br>

        </center>
    </div>

    <div id="main" class="  overflow-hidden h-screen bg-slate-300 w-full">

        <div class=' flex flex-row  h-full ' style='overflow-y:hidden'>

            <!-- " . conlist_col($row) . " -->

            <div id='left_panel' class='col-4 w-3/12 bg-slate-300'>
               

            </div>
            
            
            <div id='right_panel' class='flex flex-col  w-9/12  '>

                <div id='messages_holder_parent' class='flex flex-col   '>

                    <!-- ". message_holder($messages) ." -->
                
                </div>

                <div id='prompt_holder' class='h-[4rem] bg-slate-100 text-black text-xl border-t border-l border-gray-300'>
                    <!-- //". message_prompt(). " -->
                </div>

                

            </div>

            <div id='display_friends' class='flex flex-col  w-9/12  '>

     
                

            </div>


        </div>

    </div>



    <script type="text/javascript">
        let pagestate = "";

        function _(element) {
            return document.getElementById(element);
        }

        function openSlideMenu() {
            _('side-menu').style.width = '25%';
            _('main').style.position = 'relative';
            _('main').style.left = '25%';
            _('main').style.width = '75%';
        }

        function closeSlideMenu() {
            _('side-menu').style.width = '0';
            _('main').style.marginLeft = '100%';


        }
    </script>


    <script src="js/menu.js"></script>
    <script type="text/javascript" src="js/settings.js"> </script>

    <script type="text/javascript" src="js/home.js">




    </script>

</body>

</html>