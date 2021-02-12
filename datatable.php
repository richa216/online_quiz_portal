<?php


include 'dbcon.php';

$case=$_POST['action'];


// $case='show';
	           switch ($case) {
	           	case 'show':
	           	    $x = new  answer_tbl();
	                $z = $x->showcat();
	           // echo "<pre>";
	           echo $z;
	    
	           
	           }

?>