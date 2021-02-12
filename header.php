<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;
margin: 0;
padding: 0}

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
</style>
<body>

<div class="navbar" >
 
          <?php
                  if(!isset($_SESSION['email']))
                  {
                 
                    echo '<a href="login.php"><i class="fa fa-fw fa-user"></i>Login</a>';
                    echo '<a href="registration.php"  ><i class="fa fa-fw fa-user"></i> Sign UP</a>';
                  }
                  else
                  {
                    if(isset($_SESSION['email']) && $_SESSION['email']=='admin@gmail.com')
                    {
                         echo '<a href="#"><i class="fa fa-fw fa-user"></i>'.$_SESSION['email'].'</a>';
                         echo '<a href="admin.php"></i>Dashboard</a>';
                          echo '<a href="studentinfo.php"></i>Student\'s Details</a>';
                           echo '<a href="studentlist.php"></i>Student\'s Performance</a>';

                      echo '<a href="logout.php"><i class="fa fa-sign-out" style="font-size:36px"></i>Logout</a>';
                    }
                    else
                    {
                      echo '<a href="#"><i class="fa fa-fw fa-user"></i>'.$_SESSION['email'].'</a>';
                      echo '<a href="performance1.php"><i class="fa fa-fw fa-trophy"></i>Your Performance</a>';
                      echo '<a href="user.php"></i>Dashboard</a>';
                      echo '<a href="logout.php"><i class="fa fa-sign-out" style="font-size:36px"></i>Logout</a>';
                    }
                 

                  }
          ?>

</div>

</body>
</html> 
