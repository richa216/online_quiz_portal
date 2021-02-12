<?php
  session_start();
include 'dbcon.php';
if(isset($_POST['name']))
{
	   $name = $_POST['name'];
    $email = $_POST['email'];

    $password = password_hash($_POST['password'],PASSWORD_BCRYPT );
 
    
    $x = new quizdata();
    $y = $x->insertinfo($name,$email,$password);
    echo $name;
}



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

  

if(isset($_POST['password']))
{


$x = new  quizdata();
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

if(isset($_POST['subject']))
{

		$subject = $_POST['subject'];
    if($subject!=null)
    {
        $x = new  ques_tbl();

  $y = $x->addsubject($subject);
  echo 'add successfuly';

    }
    else
    {
        echo 'please fill details';

    }


}
if(isset($_POST['answer']))
{
      $subjectid = $_POST['subject1'];
  $question    = $_POST['ques'];
  $option1    = $_POST['option1'];
  $option2  = $_POST['option2'];
  $option3 = $_POST['option3'];
  $option4  = $_POST['option4'];
  $answer  = $_POST['answer'];
  $y = new answer_tbl();
  $z = $y->addanswer($subjectid,$question,$option1,$option2,$option3,$option4,$answer);
  echo $z;
}
   if(isset($_POST['id']))
   {
       $quesid = $_POST['id'];
   $sid    = $_POST['sid'];
   $ques   = $_POST['ques'];
   $op1    = $_POST['op1'];
   $op2   = $_POST['op2'];
   $op3  = $_POST['op3'];
   $op4 = $_POST['op4'];
   $ans = $_POST['ans'];
    $x1 = new  answer_tbl();
  $z1 = $x1->updateques($quesid,$sid,$ques,$op1,$op2,$op3,$op4,$ans);
  print_r($z1);
   }

    if(isset($_POST['id1']))
  {
    $quesid1 = $_POST['id1'];
    
    $x2 = new  answer_tbl();
      $z2 = $x2->deleteques($quesid1);
      print_r($z2);
  }



    if(isset($_POST['id2']))
  {
    $id2 = $_POST['id2'];
    $sub2 = $_POST['sub2'];
    
    $x2 = new ques_tbl();
      $z2 = $x2->updatesub($id2,$sub2);
      print_r($z2);
  }
     if(isset($_POST['subjectid1']))
  {
    $id3 = $_POST['subjectid1'];

    
    $x3 = new ques_tbl();
      $z3 = $x3->deletesub($id3);
      print_r($z3);
  }
?>