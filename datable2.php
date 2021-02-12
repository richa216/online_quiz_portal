<?php


include 'dbcon.php';

$id = $_GET['id'];

	         
	          
	                $x1 = new  answer_tbl();
	                $z1 = $x1->showcat2($id);
	           // echo "<pre>";
	           echo $z1;
	           

?>