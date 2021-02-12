<?php
session_start();

include 'dbcon.php';
$x = new  quizdata();


if(isset($_POST['password']))
{



$email1 = $_POST['email'];
$password1 =  $_POST['password'];
$_SESSION['email'] = $email1;
$_SESSION['password'] = $password1;
$ema = $_SESSION['email'];
$pwd = $_SESSION['password'];

$y = $x->login($ema);

if(password_verify($password1,$y))
{
     // echo 'password match';
    $z = $x->SelectIsadmin($ema); 
    echo($z);
}
else
{
    echo 'password doesnt match';
}
    


}




?>