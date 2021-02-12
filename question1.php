<?php  session_start();
if(!isset($_SESSION['email']))
{
  echo '<script>window.location.href = "login.php"</script>';
}?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<style>
* {
  box-sizing: border-box;
}

body {
background: #333;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;

  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
#timer
{
  float: right;
}
</style>
<body oncontextmenu="return false;">
<?php include 'header.php'; ?>


<div>

<form method="POST" id="regForm" action="result.php">

<div>
<p id="timer">0:0</p>
</div>
  <?php
 
   include 'dbcon.php';

	$id = $_GET['id'];
	// echo ($limit);
	// echo($id);
	echo "<input type='text' name='id1' id='id1' value='{$id}'>";
	$x = new  answer_tbl();
	$z = $x->showques1($id);
// print_r($z);

	foreach ($z as $key => $value)
	{

			echo '<div class="tab">';
	        echo '<h1>Question:'.($key+1).'</h1>'; 
    
	   		echo '<h6 id="ques" oncopy="return false">'.'Question'.($key+1).'. '.$value['question'].'</h6>';
	   			// echo $key1.'.';
	   		    echo "<input type='radio' name='{$value['id']}' value='option1' >A.".$value['option1'].'</input>';
	   			echo '<br>';
	   		        echo "<input type='radio' name='{$value['id']}' value='option2' >B.".$value['option2'].'</input>';
	   			echo '<br>';
	   		            echo "<input type='radio' name='{$value['id']}' value='option3'>C.".$value['option3'].'</input>';
	   			echo '<br>';
	   		            echo "<input type='radio' name='{$value['id']}' value='option4' >D.".$value['option4'].'</input>';
	   			echo '<br>';
                    echo "<input type='radio' name='a5' value=' ' id='a5' hidden>";
	   	  	echo '<br>';
    
 echo '</div>';

		}
		
 	

?>

    
  <!-- One "tab" for each step in the form: -->

  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      <input type="submit" id="btn">
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->

  <div style="text-align:center;margin-top:40px;">
  	<?php
        for ($i=0; $i < sizeof($z); $i++)
        { 
        	echo '<span class="step"></span>';
        }

  	?>
   

  </div>
</form>

</div>


<script>
var currentTab = 0; 
showTab(currentTab); 

function showTab(n) {

  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";

  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }

  fixStepIndicator(n)
}

function nextPrev(n) {

  var x = document.getElementsByClassName("tab");
 
  if (n == 1 && !validateForm()) return false;

  x[currentTab].style.display = "none";
  
  currentTab = currentTab + n;

  if (currentTab >= x.length) {
  
    document.getElementById("regForm").submit();
    return false;
  }
  
  showTab(currentTab);
}

function validateForm() {

  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");

  for (i = 0; i < y.length; i++) {
   
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    }
  }

  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; 
}

function fixStepIndicator(n) {
  
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  x[n].className += " active";
}



document.getElementById('id1').style.display = 'none';




document.getElementById("btn").style.display = 'none';

function startTimer(duration, display) {
var timer = duration, minutes, seconds;
setInterval(function () {
minutes = parseInt(timer / 60, 10);
seconds = parseInt(timer % 60, 10);

minutes = minutes < 10 ? "0" + minutes : minutes;
seconds = seconds < 10 ? "0" + seconds : seconds;

display.textContent = minutes + ":" + seconds;

if (--timer < 0) {
timer = duration;
}
if (timer==0) {
document.getElementById("btn").click();
}
}, 1000);
}

function countdown() {
var fiveMinutes = 60;
display = document.querySelector('#timer');
startTimer(fiveMinutes, display);
}
countdown();
$(document).bind("contextmenu",function(e) {
  e.preventDefault();
});
$(document).keydown(function(e){
  if(e.which === 123 || e.which === 73){
    return false;
}
});

</script>

</body>
</html>
