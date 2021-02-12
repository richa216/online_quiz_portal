<?php  session_start();

if(isset($_SESSION['email']) && $_SESSION['email']!='admin@gmail.com')
{
   echo '<script>window.location.href = "user.php"</script>';
}
if(!isset($_SESSION['email']))
{
  echo '<script>window.location.href = "login.php"</script>';
}?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  


<style>
	#bt{
		text-align: center;border-radius: 5px;border: none;color: black;height: 50px;margin-top:30px;
	}
		#bt2{
		text-align: center;border-radius: 5px;border: none;color: black;height: 50px;margin-top:30px;
	}

	
</style>
</head>

<body>
	<?php include 'header.php'; ?>
	    <div style="text-align: center;">
    	
    	<a href="addquestions.php"><input type="submit" name="bt" id="bt" value="Add Question"></a>
<a href="admin.php"><input type="submit" name="bt1" id="bt2" value="Add Category"></a>
    </div>

    <div class="table-responsive" style="padding:100px;">
       <table id="totalrides" class="table table-striped table-bordered">
            <thead>
              <tr>
                 <td>Subject_id</td>
                <td>Email_id</td>
                <td>Name</td>
             
                
                     
                        
            </tr>
            </thead>
                    <tbody>

              <?php
              include 'dbcon.php';
                       $x1 = new  tbl_user();
                  $z1 = $x1->showuserinfo();
          
              for($i=0;$i<sizeof($z1);$i++)
              {
                 echo
               '<tr>
                 
                  <td>'.$z1[$i]['subject_id'].'</td>
                   <td>'.$z1[$i]['email_id'].'</td>
                
                <td>'.$z1[$i]['name'].'</td>
               
              
         
                </tr>';
              
              }

              ?>
            </tbody>
        </table>
        
    </div>

 
        

 <script>

// $(document).ready(function() {
  

//     var table = $('#totalrides').DataTable( {
//         "bPaginate": false,
//         "bFilter": false,
//           "ordering": false,


//         "ajax": {
//         	"url":"datatable1.php",
//         	 "dataSrc":"",
//         	"type":"POST",
//         	"data":{"action1":'show3'},

//         },

//     } );



// });
    </script>
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
</body>
</html>