<?php 

if(isset($_SESSION['id']))
{
    unset($_SESSION['id']);
}

$info->logged_in = false;
echo json_encode($info);