<!DOCTYPE html>
<html>
<head>
	<title>Progress Bar</title>
	        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<style>
		.progress-bar
		{
			float: right;
			position: relative;
			border: 1px solid #000000;
			width: 300px;
			height: 50px;
			margin-top: 30%;



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


	</style>
</head>
<body>



<?php include 'header.php'; ?>

    <form name="quiz" id="quiz" style="float: left;">
    	
   
		<h2>MATH's QUIZ</h2>
		<div>
			<h6 id="q1">Question 1. Find the sum of 111 + 222 + 333</h6>
			<input type="radio" name="a1" value="700">A.700</div>
			<input type="radio" name="a1" value="666">B.666</div><br>
			<input type="radio" name="a1" value="10">C.10</div><br>
			<input type="radio" name="a1" value="100">D.100</div><br>
		</div>
		<div class="ques2" id="ques2"  name="ques2">
			<h6 id="q2">Question 2. Subtract 457 from 832</h6>
			<input type="radio" name="a2" value="375">A.375</div>
			<input type="radio" name="a2" value="57">B.57</div><br>
			<input type="radio" name="a2" value="376">C.376</div><br>
			<input type="radio" name="a2" value="970">D.970</div><br>
		</div>
		<div class="ques3" id="ques3"  name="ques3">
			<h6 id="q3">Question 3. 50 times 5 is equal to</h6>
			<input type="radio"  name="a3" value="375">A.375</div>
			<input type="radio"  name="a3" value="250">B.250</div><br>
			<input type="radio"  name="a3" value="376">C.376</div><br>
			<input type="radio"  name="a3" value="None of these">D.None of these</div><br>
		</div>
		<div class="ques4" id="ques4">
			<h6 id="q4">Question 4. Solve : 200 – (96 ÷ 4)</h6>
			<input type="radio"  name="a4"  value="375">A.375</div>
			<input type="radio"  name="a4" value="176">B.176</div><br>
			<input type="radio"  name="a4" value="376">C.376</div><br>
			<input type="radio"  name="a4" value="None of these">D.None of these</div><br>
		</div>
		<div class="ques5" id="ques5">
			<h6 id="q5">Question 5. Solve : 200 – (96 ÷ 2)</h6>
			<input type="radio" name="a5"  value="375">A.375</div>
			<input type="radio" name="a5" value="176">B.176</div><br>
			<input type="radio" name="a5"  value="376">C.376</div><br>
			<input type="radio" name="a5"  value="None of these">D.None of these</div><br>
		<br><br>

		<div class="btn">
			<input type="Submit" class="sub" id="sub" value="submit">	
		</div>
     </form>
		
		<div class="progress-bar">
		<div class="prog-value" id="val"></div>
		<div class="prog-fill-color" id="fillcolor"></div>
	</div>







	<script>
	


    $(document).ready(function()
    {
    	$('.progress-bar').hide();
    		
    	$('#sub').click(function(e)
        {
        	var val = document.getElementById("val").innerHTML;
			document.getElementById("fillcolor").style.width = val;
        	e.preventDefault();
        	var q1 = document.quiz.a1.value;
        	var q2 = document.quiz.a2.value;
        	var q3 = document.quiz.a3.value;
        	var q4 = document.quiz.a4.value;
        	var q5 = document.quiz.a5.value;
			arr = Array(q1,q2,q3,q4,q5)
			console.log(arr);
			 $.ajax({
		        method:'POST',
		        url:'pb.php',
		        data:
		        {
		        	arr1:arr
		        },
		        success:function(data1)
		        {
		        	debugger;
		        	console.log(data1);
		        	document.getElementById("fillcolor").style.width = data1;
		        	document.getElementById("val").innerHTML = data1;
		        }
        
            });
            $('.progress-bar').show();	
        })
    })  


     



        
   




	</script>

</body>
</html>