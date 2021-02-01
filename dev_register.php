

<?php 
session_start();
require 'config/db_config.php';

$db = new Db();

# Signup

if (isset($_POST['submitreg'])) {
    $fname = filter_var($_POST['fname'],FILTER_SANITIZE_STRING);
    $lname = filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
    $ghub = filter_var($_POST['github'],FILTER_SANITIZE_URL);
    $pass = $_POST['pass'];
    
    $db->registerDev($fname,$lname,$ghub,0,'Morocco','avat.svg',$pass,'---');
    echo "Registration done successfully :)";

    /*
    if($db->registerDev($fname,$lname,$ghub,0,'Morocco','avat.svg',$pass,'---')){
        echo "Registration done :)";
    }else{
        echo "Oops somthing went wrong please try again! <pre>";
        print_r($_POST);
        echo "<pre>";
    }
    */
}

# Login

if(isset($_POST['login'])) {
    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $loginpass = $_POST['loginpass'];

    if(!$data = $db->logdev($username,$loginpass)){
        http_response_code(401);
        echo "Wrong username or password !";
    }else{
        http_response_code(200);
        $_SESSION['id'] = $data[0];
        $_SESSION['username'] = $data[2]." ".$data[1];
    }
}