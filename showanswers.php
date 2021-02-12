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
  #formupdate
  {
    text-align: center;
    border:2px solid black;
    border-radius: 5px;

    width: 300px;
    height: auto;
    padding: 10px;
    margin-top: 10px;
    margin-left: 600px;

  }

	
</style>
</head>

<body style="text-align: center;">
	<?php include 'header.php'; ?>

	    <div style="text-align: center;">
    	
    	<a href="addquestions.php"><input type="submit" name="bt" id="bt" value="Add Question"></a>
<a href="admin.php"><input type="submit" name="bt1" id="bt2" value="Add Category"></a>
    </div>
    <div id="formupdate">
  <form method="POST" >
    <b>Question Id:</b><input type="text" name="id" id="id"><br><br>
    <b>Subject Id:</b><input type="text" name="sid" id="sid"><br><br>
    <b>Question:</b><input type="text" name="ques" id="ques"><br><br>
    <b>Option1:</b><input type="text" name="op1" id="op1"><br><br>
   <b> Option2:</b><input type="text" name="op2" id="op2"><br><br>
<b>Option3:</b><input type="text" name="op3" id="op3"><br><br>
<b>Option4:</b><input type="text" name="op4" id="op4"><br><br>
<b>Answer:</b><input type="text" name="ans" id="ans"><br><br>
<input type="submit" name="upd" id="upd" value="update">
  </form>
</div>
    <div class="table-responsive" style="padding:100px;">
       <table id="totalrides" class="table table-striped table-bordered">
            <thead>
              <tr>
                <td id="qid">Id</td>
                <td>Subject_Id</td>
                 <td>Questions</td>
                  <td>Option1</td>
                   <td>Option2</td>
                    <td>Option3</td>
                     <td>Option4</td>
                      <td>Answer</td>
                          <td>Action</td>
                           <td>Action</td>
                     
                           
              </tr>
            </thead>
                                <tbody>

              <?php
              include 'dbcon.php';
                            $x1 = new  answer_tbl();
                  $z1 = $x1->showcat1();
          
              for($i=0;$i<sizeof($z1);$i++)
              {
                 echo
               '<tr>
                   <td>'.$z1[$i]['id'].'</td>
                  <td>'.$z1[$i]['subject_id'].'</td>
                   <td>'.$z1[$i]['question'].'</td>
                <td>'.$z1[$i]['option1'].'</td>
                <td>'.$z1[$i]['option2'].'</td>
                <td>'.$z1[$i]['option3'].'</td>
                <td>'.$z1[$i]['option4'].'</td>
                <td>'.$z1[$i]['answer'].'</td>
            <td>'.'<input type="submit" value="update" class="update">'.'</td>
               <td>'.'<input type="submit" value="delete" class="delete">'.'</td>
                </tr>';
              
              }

              ?>
            </tbody>
        </table>
        
    </div>





 

 <script>

$(document).ready(function() {
  $('#formupdate').hide();
    // var table = $('#totalrides').DataTable( {
    //     "ajax": {
    //     	"url":"datatable1.php",
    //     	 "dataSrc":"",
    //     	"type":"POST",
    //     	"data":{"action1":'show1'},
    //     },
    //                "columnDefs": [ {
    //         "targets": -1,
    //         "data": null,
    //         "defaultContent": '<button class="update" type="button" style="margin:10px;color:green;">Update</button>'+ '<button class="delete" type="button" style="margin:10px;color:red;">Delete</button>'
    //     } ]

    // } );

    $('#totalrides tbody').on( 'click', '.update', function (e) {
      $('#formupdate').show();
      tr = e.target.parentNode.parentNode;

      id = tr.getElementsByTagName("td")[0].innerHTML;
       sid = tr.getElementsByTagName("td")[1].innerHTML;
        ques = tr.getElementsByTagName("td")[2].innerHTML;
         op1 = tr.getElementsByTagName("td")[3].innerHTML;
          op2 = tr.getElementsByTagName("td")[4].innerHTML;
           op3 = tr.getElementsByTagName("td")[5].innerHTML;
               op4 = tr.getElementsByTagName("td")[6].innerHTML;
                   ans = tr.getElementsByTagName("td")[7].innerHTML;

                   $('#id').val(id);
                    $('#sid').val(sid);
                     $('#ques').val(ques);
                      $('#op1').val(op1);
                      $('#op2').val(op2);
                      $('#op3').val(op3);
                      $('#op4').val(op4);
                        $('#ans').val(ans);
      // alert(x);
       // $("table").attr("contenteditable","true");

 

    } );



   $('#upd').click(function(){
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
 
      $('#totalrides tbody').on( 'click', '.delete', function (e1) {
        // var data = table.row( $(this).parents('tr') ).data();
        // alert(data);

       
           tr = e1.target.parentNode.parentNode;
      x = tr.getElementsByTagName("td")[0].innerHTML;
      if(confirm("Are you sure you want to delete this?"))
      {
              $.ajax({
        type:'POST',
        url:'helper.php',
        data:{
          id1:x
        },
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
            }
                location.reload();
    } );
});





    </script>
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
</body>
</html>