<?php
   session_start();
   include 'dbcon.php';
	$limit = $_POST['limit1'];
	$id = $_POST['id1'];
	// echo ($limit);
	// echo($id);
	$x = new  answer_tbl();
	$z = $x->showques3($id,$limit);
	$t = json_encode($z);
	echo $t;


?>