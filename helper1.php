<?php 
   session_start();
   include 'dbcon.php';
   $text = $_POST['text1'];
	$x = new  answer_tbl();
	$z = $x->showques($text);
	print_r($z);
 ?>