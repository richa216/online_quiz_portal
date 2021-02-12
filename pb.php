<?php
  session_start();

include_once 'quizdata.php';



// $arr1 = $_POST['arr1'];
// // print_r($arr1);

// $marks = 0;
// $arr = [];
//  while($row = $data->fetch_assoc())
//         {
//         	$arr[] =array($row['answers']);
//         	}
// for($j=0;$j<sizeof($arr);$j++)
// {
// 	for($i=0;$i<sizeof($arr1);$i++)
// 	{
// 		if($j == $i)
// 		{
// 			if($arr[$j][0]==$arr1[$j])
//         	{
//         		$marks = $marks+1;
//         	}
// 		}
// 	}
// }
// 		# code...
	
// echo ((($marks*5+5)*100/25).'%');

  
  if(isset($_POST['submit']))
  {

    $password = password_hash($_POST['password'],PASSWORD_BCRYPT );
    $name = $_POST['name'];
    
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    $y = $x->insertinfo($name,$email,$password);
    echo('hello');
  }
 

?>