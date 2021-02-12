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
       <div id="formupdate">
  <form method="POST" >

    <b>Subject Id:</b><input type="text" name="id2" id="sid"><br><br>
    <b>Subject:</b><input type="text" name="sub2" id="sub"><br><br>


<input type="submit" name="upd1" id="upd1" value="update">
  </form>
</div>
    <div class="table-responsive" style="padding:100px;">
       <table id="totalrides" class="table table-striped table-bordered">
            <thead>
              <tr>
                <td>Id</td>
                <td>Subject</td>
                <td>Update</td>
                 <td>Delete</td>
                   <td>Show</td>
              </tr>
            </thead>
            <tbody>

              <?php
              include 'dbcon.php';
                    $x = new  answer_tbl();
                  $z1 = $x->showca();
          
              for($i=0;$i<sizeof($z1);$i++)
              {
                 echo
               '<tr>
                  <td>'.$z1[$i]['id'].'</td>
                  <td>'.$z1[$i]['subject'].'</td>
               
               <td>'.'<input type="submit" value="update" class="updatecat">'.'</td>
               <td>'.'<input type="submit" value="delete" class="deletecat">'.'</td>
          <td>'.'<input type="submit" value="show" class="show">'.'</td>
                </tr>';
              
              }

              ?>
            </tbody>
        </table>
        
    </div>

    <div class="table-responsive" id='table2' style="padding:100px;">
       <table id="totalrides1" class="table table-striped table-bordered">
            <thead>
              <tr>
                <td>Id</td>
                <td>Subject_Id</td>
                 <td>Questions</td>
                  <td>Option1</td>
                   <td>Option2</td>
                    <td>Option3</td>
                     <td>Option4</td>
                      <td>Answer</td>
                         
                           
              </tr>
            </thead>
            <tbody>
               <?php
             
             
                 echo
               '<tr>
                  <td id="id1"></td>
                   <td id="sid1"></td>
                    <td id="ques"></td>
                     <td id="opt1"></td>
                      <td id="opt2"></td>
                  <td id="opt3"></td>
                    <td id="opt4"></td>
                      <td id="answer"></td>
               
      
                </tr>';
              
              

              ?>
            </tbody>
        </table>
        

 <script>

$(document).ready(function() {
   $('#formupdate').hide();
	$('#table2').hide();

    $('#totalrides tbody').on( 'click', '.show', function () {
    	$('#table2').show();
        var data = table.row( $(this).parents('tr') ).data();
      
                    	// $(location).attr('href','showquestions.php?id='+data[0]);
  // var table1 = $('#totalrides1').DataTable( {
  // 	  stateSave: true,
  //        "bDestroy": true,
  //           "bPaginate": false,
  //       "bFilter": false,
  //         "ordering": false,
  //       "ajax": {
  //       	"url":'datable2.php?id='+data[0],
  //       	 "dataSrc":"",
  //       	"type":"POST",
  //       	"data":{"action2":'show2'},

  //       },


  //   } );
          $.ajax({
        type:'POST',
        url:'datable2.php?id='+data[0],
       
        success:function(data)
        {
          alert(data);
        }
        
      });

    } );
      $('#totalrides tbody').on( 'click', '.updatecat', function (e) {
         $('#formupdate').show();
         tr = e.target.parentNode.parentNode;
     id = tr.getElementsByTagName("td")[0].innerHTML;
      sub = tr.getElementsByTagName("td")[1].innerHTML;
                   $('#sid').val(id);
                      $('#sub').val(sub);
                     
            } );



   $('#upd1').click(function(){
        $.ajax({
        type:'POST',
        url:'helper.php',
        data:$("form").serialize(),
        success:function(data)
        {
          if(data==1)
          {
            alert('updated Successfuly');
          }
          else
          {
            alert("error in updation");
          }
        }
        
      });
         $('#formupdate').hide();
   })     
      $('#totalrides tbody').on( 'click', '.deletecat', function (e) {
         tr = e.target.parentNode.parentNode;
     id3 = tr.getElementsByTagName("td")[0].innerHTML;
                       $.ajax({
        type:'POST',
        url:'helper.php',
        data:{subjectid1:id3},
        success:function(data)
        {
          if(data==1)
          {
            alert('deleted Successfuly');
          }
          else
          {
            alert("error in deletion");
          }
        }
       
      });  
            location.reload();          
            } );
});
    </script>
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
</body>
</html>