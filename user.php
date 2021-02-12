<?php  

session_start();
if(!isset($_SESSION['email']))
    {
      echo '<script>window.location.href = "login.php"</script>';
    }
if(isset($_SESSION['email']) && $_SESSION['email']=='admin@gmail.com')
  {
    echo '<script>window.location.href = "admin.php"</script>';
  }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="text-align: center;"> 
	<?php include 'header.php';?>


 
<div class="container">
  <h2 style="margin-top: 50px;">Quiz Section</h2>

           <?php
                                        include 'dbcon.php';
                                        $x = new ques_tbl();
                                        $value = $x->selectsubject2();
                                     
                                        echo '<div class="card-columns" style="cursor:pointer;">';
                                     
                                        foreach($value as $key=>$value)
                                        {
                                        	 
                                        	
                                            echo '<div class="card bg-success">';
      echo '<div class="card-body text-center">';
      echo "<h3>Take Test</h3>";
        echo '<p class="card-text" id="text1" name="text1" style="border:2px solid white;">'.$value['subject'].'</p>';
      echo '</div>';
    echo '</div>';
 
 
                                              
                                              
                                              
                                        }

                                        echo '</div>';
                                        
                        ?>   
  </div>





  <script>
  	
				 $(document).ready(function(){

     
        $('p').click(function(e) {
        	   e.preventDefault();
    var text = $(this).text();
    // alert(text);

        $.ajax({
                  method:'POST',
                  url:'helper1.php',
                  data:{
                  	text1:text
                  },
                  success:function(data)
                  {
                      console.log(data);
                    
                    	// alert(data);
                    	window.location.href = 'question1.php';
                    	$(location).attr('href','question1.php?id='+data);
                    
                  }
              });


           });

});



  </script>
</body>
</html>
