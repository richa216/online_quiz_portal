<?php
include_once 'dbcon.php';

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

}



?>