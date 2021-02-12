<?php
session_start();




include 'dbcon.php';
$email = $_SESSION['email'];
// $case='show';

$case=$_POST['action1'];
	           switch ($case) {
	         
	           case 'show1':
	                $x1 = new  answer_tbl();
	                $z1 = $x1->showperformance1($email);
	           // echo "<pre>";
	                echo $z1;
	           
	           }

?>