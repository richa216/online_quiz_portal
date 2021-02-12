<?php session_start(); 
if(isset($_SESSION['email']) && $_SESSION['email']!='admin@gmail.com')
{
   echo '<script>window.location.href = "user.php"</script>';
}
if(!isset($_SESSION['email']))
{
  echo '<script>window.location.href = "login.php"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style>
		

/* BASIC */

html {

}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
}

a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}





/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder {
  color: #cccccc;
}







/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}

	</style>
</head>
<body>



<?php include 'header.php';?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
     <h2>ADD SUBJECT</h2>
    </div>

    <!-- Login Form -->
	<form>
		<div>
	
		                   <select id="subject1" class="form-control" 
                    name="subject1">
                        <option  disabled selected>--Subject Category--</option>
                        <?php
                                        include 'dbcon.php';
                                        $x = new ques_tbl();
                                        $value = $x->selectsubject();
                                        foreach($value as $key=>$value)
                                        {
                                        
                                              
                                              echo "<option value='". $value['id'] ."'>" .$value['subject'] ."</option>"; 
                                              
                                        }
                        ?>   

                        
                    </select>

		</div><br>



		<div>
			<label>ADD QUESTION:</label><br>

			<input type="text" name="ques" id="ques" placeholder="add question"><br><br>
		</div>

		<div>
		<label>OPTIONS:</label><BR>
			<input type="text" name="option1" id="option1"><br>
			<input type="text" name="option2" id="option2"><br>
			<input type="text" name="option3" id="option3"><br>
			<input type="text" name="option4" id="option4"><br><br>
		</div>
      <label>ANSWER:</label><br>
 
    <select id="answer" name="answer" class="form-control">
       <option  disabled selected>--Subject Category--</option>
       <option value="option1">option1</option>
      <option value="option2">option2</option>
      <option value="option3">option3</option>
            <option value="option4">option4</option>
    </select><br><br>

		<input type="submit" name="addques" id="addques" value = "add">
    <a href="admin.php"><input type="button" name="addcategory" id="addques1" value = "Add Category"></a>
       <a href="showanswers.php"><input type="button" name="addcategory1" id="addques2" value = "show questions"></a>
	</form>




  </div>
</div>


			<script>


				 $(document).ready(function(){
   $('#addques').click(function(e){
        e.preventDefault();
        if(($('#subject1').val()!=null) && ($('#ques').val()!=null) && ($('#answer').val()!=null) && ($('#answer').val()!=null))
        {


        $.ajax({
                  method:'POST',
                  url:'helper.php',
                  data:$("form").serialize(),
                  success:function(data)
                  {
                    console.log(data);
                    
                    	alert("added successfully");
                    	// window.location.href = 'addquestions.php';
                 
                
                    
                  }
              });
      }
      else
      {
        alert('please fill all details');
      }


           });
});
</script>
</body>
</html>

