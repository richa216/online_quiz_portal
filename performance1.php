<?php  session_start();
if(!isset($_SESSION['email']))
{
  echo '<script>window.location.href = "login.php"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  



</head>

<body>
	<?php include 'header.php'; ?>
	    <div style="text-align: center;">

    </div>
    <div class="table-responsive" style="padding:100px;">
       <table id="totalrides" class="table table-striped table-bordered">
            <thead>
              <tr>
                <td>Subject</td>
                <td>Attempted Questions</td>
                 <td>Unattempted Questions</td>
                  <td>Marks</td>
                   <td>Percentage</td>
                 
                     
                     
                           
              </tr>
            </thead>
                        <tbody>

              <?php
              include 'dbcon.php';
              $email = $_SESSION['email'];
              $x1 = new  answer_tbl();
              $z1 = $x1->showperformance1($email);
          
              for($i=0;$i<sizeof($z1);$i++)
              {
                 echo
               '<tr>
                  <td>'.$z1[$i]['subject'].'</td>
                  <td>'.$z1[$i]['attempted_ques'].'</td>
                   <td>'.$z1[$i]['unattempted_ques'].'</td>
                    <td>'.$z1[$i]['marks'].'</td>
                     <td>'.$z1[$i]['percentage'].'</td>
               
   
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
//         	"url":"d3.php",
//         	 "dataSrc":"",
//         	"type":"POST",
//         	"data":{"action1":'show1'},

//         },
//     } );

    // $('#totalrides tbody').on( 'click', 'button', function () {
    //     var data = table.row( $(this).parents('tr') ).data();
    //     console.log(data);
    // } );






    </script>
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
</body>
</html>