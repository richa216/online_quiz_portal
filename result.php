<?php session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<style>
		.progress-bar
		{
		
			position: relative;
			border: 1px solid #000000;
			width: 300px;
			height: 50px;
			margin-top: 3%;



		}
		.progress-bar .prog-value
		{
			position: absolute;
			color: black;
	
			align-items: center;
			justify-content: center;
			width: 100%;
			height: 100%;
			display: flex;
			font-weight: bold;
			
		}
		.prog-fill-color
		{
			width: 50%;
			height: 100%;
			background-color: green;
			transition: width 0.5;
		

		}
		h3
		{
			color: white;
		}
#sub{
	width: 200px;
	height: 50px;
	margin-top: 100px;
	border: none;
	border-radius: 10px;
	background-color: grey;
	color: white;
	font-size: 18px;
}
#sub2{
	width: 200px;
	height: 50px;
	margin-top: 100px;
	border: none;
	border-radius: 10px;
	background-color: grey;
	color: white;
	font-size: 18px;
}
#sub3{
	width: 200px;
	height: 50px;
	margin-top: 100px;
	border: none;
	border-radius: 10px;
	background-color: grey;
	color: white;
	font-size: 18px;
}
body{
	background: #333;text-align: center;
}
	</style>
</head>

<body>
	<?php include 'header.php'; ?>


	<?php  
	include 'dbcon.php';

	

		

if(isset($_POST))
{
	$answers = $_POST;

// print_r($answers);

	$id=$answers['id1'];
	$x = new  answer_tbl();
	$z = $x->showques2($id);

	// echo $id;
	// print_r($z);
	// foreach ($answers as $key => $value) {
	// 	foreach ($answers as $key => $value) 
	// 	{
	// 		echo $value;
	//      	echo '<br>';
	// 	}

	
	// }


$marks = 0;
$notanswer = 0;
$answered = 0;
$answered1 = 0;
// for($i=0;$i<sizeof($z);$i++)
// {
// 	if (empty($answers[$i]))
// 		{ 
// 			$notanswer=$notanswer+1;
			
// 		}
//     else
//     {
//     	if($answers[$i] == $z[$i]['answer'])
//     	{
//     		$answered = $answered+1;
//     			// echo $answered; 
//     				// echo $answered; 
//     	}
//     }



// }
foreach ($answers as $key => $value)
{
	if($key!='id1')
	{
		if (empty($answers[$key]))
		{ 
			$notanswer=$notanswer+1;
			
		}
		else
		{
			$k = $x->showques3($id,$key);
			$answered1 = $answered1+1;
			if($k[0]['answer']==$answers[$key])
			{
				$answered = $answered+1;
			}
		}
	

		// print_r($k);
	}
}
echo  '<h3>ATTEMPTED QUESTIONS:'.' '.$answered1.'</h3>';
echo  '<h3>UNATTEMPTED QUESTIONS:'.' '.(10-$answered1).'</h3>';
$unat = 10-$answered;
echo '<br>';

$marks = $answered*5;
$eff   = ($marks*100/(sizeof($z)*5));
$email = $_SESSION['email'];
$k = $x->showresult($email,$answered1,$unat,$marks,$id,$eff);
echo '<h3><p id="val1">Your Marks:'.($marks).'</p></h3>';
echo '<p id="val2" class="val2">'.(($marks*100/(sizeof($z)*5))).'%'.'</p>';

	}

	?>
<input type="submit" name="sub" id="sub" value="Check Your Efficiency">
		<div class="progress-bar">
		<div class="prog-value" id="val"></div>
		<div class="prog-fill-color" id="fillcolor"></div>
	</div>



	<a href="user.php"><input type="submit" name="sub2" id="sub2" value="Take Another Test"></a>
		<a href="performance.php?id=<?php echo $id;?>"><input type="submit" name="sub3" id="sub3" value="Your Performance"></a>

	<script>
    $(document).ready(function()
    {
    	$('.progress-bar').hide();
    		$('.val2').hide();
    	$('#sub').click(function(e)
        {
        	var val = document.getElementById("val2").innerHTML;
        	console.log(val);
        	document.getElementById("val").innerHTML = val;
			document.getElementById("fillcolor").style.width = val;
        	e.preventDefault();

            $('.progress-bar').show();	
        })
    })  


	</script>
</body>
</html>