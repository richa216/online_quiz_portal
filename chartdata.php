<?php

   session_start();

   include 'dbcon.php';
   $subid = $_POST['subid'];
   $email=$_SESSION['email'];
    $x = new  answer_tbl();
	$z = $x->showperformance($subid,$email);
	echo $z;