<?php


   class dbcon
   {
       public $server;
       public $username;
       public $password;
       public $con;
       public $dbname;

       public function __construct()
       {
            $this->server = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname   = "quiz_data";
            $this->con = new mysqli($this->server,$this->username,$this->password,$this->dbname);
            if($this->con)
            {
            return $this->con;
            }
            else
            {
                return "error";
            }

       }
    }
class quizdata extends dbcon
{
  public function quiztbl()
  {
    $sql = 'SELECT `answers` FROM `questions_tbl`';
    $y=$this->con->query($sql);
    $sql1 = 'SELECT count(*) FROM `questions_tbl`';
    $y1=$this->con->query($sql1);

        return $y;
  }
  public function insertinfo($name,$email,$password)
  {
    $sql2 = "INSERT INTO `tbl_user` (`id`, `name`, `email_id`, `password`) VALUES (NULL, '$name', '$email', '$password')";
    $y=$this->con->query($sql2);
      return $y;
  }

  public function login($email)
  {
            $sql1 = "SELECT `password` from tbl_user where `email_id` = '{$email}' ;";
            $m = $this->con->query($sql1);
            $n = $m->fetch_assoc();
            $row = $n['password'];
            return $row;

  }

  public function SelectIsadmin($email)
  {
    $sql4 = "SELECT `status` FROM `tbl_user` WHERE  `email_id` = '{$email}'";
        $y=$this->con->query($sql4);
        $n = $y->fetch_assoc();
            $row = $n['status'];
            return $row;

  }

}

class ques_tbl extends dbcon
{
  public function addsubject($subject)
  {
    $sql4 = "INSERT INTO ques_tbl (`subject`) SELECT '{$subject}' WHERE NOT EXISTS (SELECT `subject` FROM ques_tbl WHERE subject='{$subject}');";
    // $sql4 = "INSERT INTO `ques_tbl`(`id`, `subject`) VALUES (NULL,'{$subject}');";
    $y=$this->con->query($sql4);
    return $y;
  }

  public function selectsubject()
  {
            $sql1 = "SELECT  DISTINCT `id`, `subject` FROM `ques_tbl` WHERE `id` ;";
            $m = $this->con->query($sql1);
      

                $arr = array();
                while($row = $m->fetch_assoc())
                {
                    $arr[]=array(
                        "id"=>$row['id'],
                        "subject"=>$row['subject'],

                    );

                    
          
  }
    return $arr;
}
  public function selectsubject2()
  {
            $sql1 = "SELECT `id`, `subject` FROM `ques_tbl` WHERE `id` IN (SELECT DISTINCT(`subject_id`) FROM `answer_tbl`);";
            $m = $this->con->query($sql1);
      

                $arr = array();
                while($row = $m->fetch_assoc())
                {
                    $arr[]=array(
                        "id"=>$row['id'],
                        "subject"=>$row['subject'],

                    );

                    
          
  }
    return $arr;
}


public function updatesub($id,$sub)
{
  $sql = "UPDATE `ques_tbl` SET `id`= '{$id}',`subject` = '{$sub}' WHERE `id`= '{$id}';";
  $n = $this->con->query($sql);
  return $n;
}
public function deletesub($id3)
{
  $sql1 = "SELECT * FROM `answer_tbl` WHERE `subject_id`='{$id3}';";
    $n1 = $this->con->query($sql1);
    if(mysqli_num_rows($n1)>0)
    {
          $sql = "DELETE `ques_tbl`,`answer_tbl`  FROM `ques_tbl`  INNER JOIN `answer_tbl` ON ques_tbl.`id` = answer_tbl.`subject_id` WHERE ques_tbl.`id`= '{$id3}';";
  $n = $this->con->query($sql);
    }
    else
    {
      $sql = "DELETE FROM `ques_tbl` WHERE ques_tbl.`id`= '{$id3}';";
        $n = $this->con->query($sql);
    }

  return $n;
}

}

class answer_tbl extends dbcon
{
  public function addanswer($subjectid,$question,$option1,$option2,$option3,$option4,$answer)
  { 
    $sql = "INSERT INTO `answer_tbl` (`subject_id`, `question`, `option1`, `option2`, `option3`, `option4`,`answer`) SELECT '$subjectid', '$question', '$option1', '$option2', '$option3', '$option4','$answer' WHERE NOT EXISTS (SELECT `question` FROM `answer_tbl` WHERE question='{$question}');";

    // $sql = "INSERT INTO `answer_tbl` (`id`, `subject_id`, `question`, `option1`, `option2`, `option3`, `option4`,`answer`) VALUES (NULL, '$subjectid', '$question', '$option1', '$option2', '$option3', '$option4','$answer');";
    $m = $this->con->query($sql);
    return $m;


  }

  public function showques($name)
  {
    $sql = "SELECT `id` FROM `ques_tbl` WHERE `subject`= '{$name}' ";
    $m = $this->con->query($sql);
    $row1 = $m->fetch_assoc();
    $l = $row1['id'];

    return $l;

}



  public function showques1($l)
  {
    
    $sql2 = "SELECT  `id`,`question`, `option1`, `option2`, `option3`, `option4` FROM `answer_tbl` WHERE `subject_id` = $l ORDER BY RAND(),`subject_id` ASC LIMIT 10 ";
    $n = $this->con->query($sql2);
                    $arr = array();
                while($row = $n->fetch_assoc())
                {
                    $arr[]=array(
                        "id"=>$row['id'],
                        "question"=>$row['question'],
                        "option1"=>$row['option1'],
                        "option2"=>$row['option2'],
                        "option3"=>$row['option3'],
                        "option4"=>$row['option4']


                    );


  }
  
return $arr;

}

  public function showques2($l)
  {
    
    $sql2 = "SELECT `id`,`question`, `option1`, `option2`, `option3`, `option4`,`answer` FROM `answer_tbl` WHERE `subject_id` = $l ORDER BY `subject_id` ASC LIMIT 5";
    $n = $this->con->query($sql2);
                    $arr = array();
                while($row = $n->fetch_assoc())
                {
                    $arr[]=array(
                        "id"=>$row['id'],
                        "question"=>$row['question'],
                        "option1"=>$row['option1'],
                        "option2"=>$row['option2'],
                        "option3"=>$row['option3'],
                        "option4"=>$row['option4'],
                        "answer"=>$row['answer']


                    );


  }
  
return $arr;

}

  public function showques3($l,$m)
  {
    
    $sql2 = "SELECT `answer` FROM `answer_tbl` WHERE `subject_id` = $l  AND `id`= $m ORDER BY `subject_id` ASC";
    $n = $this->con->query($sql2);
                    $arr = array();
                while($row = $n->fetch_assoc())
                {
                    $arr[]=array(
                        "answer"=>$row['answer']


                    );


  }
  
return $arr;

}

public function showcat()
{
  $sql = "SELECT * FROM `ques_tbl`;";
  $n = $this->con->query($sql);
  $arr = array();
                while($row = $n->fetch_assoc())
                {
                    $arr[]=array($row['id'],$row['subject']);
                  }
  $arr1 = json_encode($arr);
  return $arr1;
}
public function showca()
{
  $sql = "SELECT * FROM `ques_tbl`;";
  $n = $this->con->query($sql);
  $arr = array();
                while($row = $n->fetch_assoc())
                {
                    $arr[]=array("id"=>$row['id'],"subject"=>$row['subject']);
                  }

  return $arr;
}

public function showcat1()
{
  $sql = "SELECT * FROM `answer_tbl`;";
  $n = $this->con->query($sql);
  $arr = array();
                while($row = $n->fetch_assoc())
                {
                    $arr[]=array("id"=>$row['id'],"subject_id"=>$row['subject_id'],"question"=>$row['question'],"option1"=>$row['option1'],"option2"=>$row['option2'],"option3"=>$row['option3'],"option4"=>$row['option4'],"answer"=>$row['answer']);
                  }
 
  return $arr;
}
public function showcat2($id)
{
  $sql = "SELECT * FROM `answer_tbl` WHERE `subject_id`='{$id}';";
  $n = $this->con->query($sql);
  $arr = array();
                while($row = $n->fetch_assoc())
                {
                    $arr[]=array($row['id'],$row['subject_id'],$row['question'],$row['option1'],$row['option2'],$row['option3'],$row['option4'],$row['answer']);
                  }
  $arr2 = json_encode($arr);
  return $arr2;
}





public function showresult($uname,$attques,$unattque,$marks,$sid,$percentage)
{
  $sql = "INSERT INTO `result_tbl`(`id`,`user_name`, `attempted_ques`, `unattempted_ques`, `marks`, `subject_id` ,`percentage`) VALUES (NULL,'{$uname}','{$attques}','{$unattque}','{$marks}','{$sid}','{$percentage}');";
  $n = $this->con->query($sql);
  return $n;

}



public function showperformance($subid,$email)
{
  $sql = "SELECT * FROM `result_tbl` WHERE `subject_id`='{$subid}' AND `user_name`='{$email}'";
  $n = $this->con->query($sql);
    $arr = array();
                while($row = $n->fetch_assoc())
                {
                    $arr[]=array($row['percentage']);
                  }
  // $arr2 = json_encode($arr);
  return $arr;

}

public function showperformance1($email)
{
  $sql = "SELECT * FROM `result_tbl`  as rt JOIN `ques_tbl` as qt WHERE `user_name`='{$email}' AND  rt.`subject_id` = qt.`id`";
  $n = $this->con->query($sql);
    $arr = array();
                while($row = $n->fetch_assoc())
                {

                    $arr[]=array("subject"=>$row['subject'],"attempted_ques"=>$row['attempted_ques'],"unattempted_ques"=>$row['unattempted_ques'],"marks"=>$row['marks'],"percentage"=>$row['percentage']);
                  }
  
  return $arr;

}

public function updateques($id,$sid,$ques,$op1,$op2,$op3,$op4,$ans)
{
  $sql = "UPDATE `answer_tbl` SET `id`= '{$id}',`subject_id`= '{$sid}',`question`= '{$ques}',`option1`= '{$op1}',`option2`= '{$op2}',`option3`= '{$op3}',`option4`= '{$op4}',`answer`= '{$ans}' WHERE `id`= '{$id}';";
  $n = $this->con->query($sql);
  return $n;
}
public function deleteques($quesid)
{
   $sql1 =  "DELETE FROM `answer_tbl` WHERE `id`='{$quesid}';";
     $n1 = $this->con->query($sql1);
  return $n1;

}


// public function showques3($l,$limit)
// {
//    $sql = "SELECT `id`, `subject_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer` FROM `answer_tbl` WHERE `subject_id` = $l  ORDER BY `subject_id` ASC LIMIT $limit,1";
//    $m = $this->con->query($sql);
//    $row1 = $m->fetch_assoc();
//    $arr[] = array('question' => $row1['question'], 
//                 'option1' => $row1['option1'],
//                  'option2' => $row1['option2'],
//                 'option3' =>  $row1['option3'],
//                 'option4' => $row1['option4']);
//    return  $arr;
// }
}

class tbl_user extends dbcon
{
  public function showuser()
  {
      $sql = "SELECT * FROM `result_tbl` as rt JOIN `tbl_user` as qt JOIN `ques_tbl` as qte WHERE rt.`user_name` = qt.`email_id` AND  rt.`subject_id` = qte.`id`";
  $n = $this->con->query($sql);
    $arr = array();
                while($row = $n->fetch_assoc())
                {

                    $arr[]=array("user_name"=>$row['user_name'],
                      "name"=>$row['name'],
                      "subject_id"=>$row['subject_id'],
                      "subject"=>$row['subject'],
                      "marks"=>$row['marks'],
                      "percentage"=>$row['percentage']);
                  }
  return $arr;
  }


    public function showuserinfo()
  {
      $sql = "SELECT * FROM `tbl_user`";
  $n = $this->con->query($sql);
    $arr = array();
                while($row = $n->fetch_assoc())
                {

                    $arr[]=array("subject_id"=>$row['id'],"email_id"=>$row['email_id'], "name"=>$row['name']);
                  }
 
  return $arr;
  }

}







?>