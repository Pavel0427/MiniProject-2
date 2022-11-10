<?php

  include_once 'classes/autoload.php';
  include_once 'api.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logint</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="container-fluid bg-slate-200 h-screen w-screen">


        <br>
        <br>
        <div class="row">
            <center class="flex items-center justify-center mt-8">
                <div class="  ml-4 inline-block bg-slate-600 h-96 w-1/5 rounded-tr-none rounded-br-none rounded-xl drop-shadow-md">
                    <br>
                    <h2 class="py-4 font-bold text-transparent text-4xl bg-clip-text bg-gradient-to-br from-sky-500 via-violet-300 to-pink-300 drop-shadow-lg py-12 mt-4">Welcome Back</h2>
                    <p class="text-indigo-50 drop-shadow-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, ullam.</p>

                    <p class="text-white py-20">logo Here</p>
                </div>

                <div class="inline-block box-content bg-white h-96 w-3/6 rounded-xl bg-opacity-90  drop-shadow-md rounded-tl-none rounded-bl-none">
                    <div class="flex flex-row px-12 pt-12 text-2xl font-bold text-indigo-200   drop-shadow-sm">
                        <h2 class="ml-4 "><a href="signup.php">Sign Up</a> </h2>
                        <h2 class="ml-6  text-indigo-500 "><a href="login.php">Log In</a> </h2>
                        <div class="absolute left-16 top-20 mt-2 ml-28 flex h-1 w-20 bg-sky-300"></div>
                    </div>

                    <div class="absolute inset-x-5 container pt-6">
                        <form id="myform"   >
                            <!-- name
                <label for="name">Name:</label>
                <input type="text" name="name" id="name"> -->
                            <br class="mt-4"><br>
                            <!-- Email -->
                            <label for="email">E-mail:</label><br>
                            <input class="bg-slate-200 bg-opacity-50 rounded-sm" type="email" name="email" id="email">
                            <br>
                            <!-- Phone
                <label for="contact">Phone:</label>
                <input type="tel" name="contact" id="name"> -->

                            <!-- Password -->
                            <label for="pass">Password:</label><br>
                            <input class="bg-slate-200 bg-opacity-50 rounded-sm" type="text" name="pass" id="pass">
                             <br>
                             <br>
                             <input id="login_button" type="submit" value="Login" class="bg-slate-700 text-md font-semibold rounded-lg px-2 py-1 text-white"> 
                            <!-- Password Confirmation
                <label for="passcon">Confirm Password:</label>
                <input type="text" name="passcon" id="name"> -->
                            <br>
                            <br>
                         
                        </form>
                        <div id="error" class="bg-rose-500 text-white w-fit h-fit px-2 py-1 mt-2 rounded-md text-left" style="display:none"></div>
                        <span>Dont have an Account? <a href="signup.php" class="text-indigo-500">Sign up </a> here</span>
                    </div>

                </div>
            </center>


        </div>

    </div>
    
    <script src="js/login.js"></script>

</body>

</html>