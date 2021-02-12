
<?php  session_start();  ?>

<!DOCTYPE HTML>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	  <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		#c1
		{
			float: left;
			padding: 0;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
			width: 100%;
		}
		.chart
		{

			margin-top: 150px;
			margin-left: 100px;
			width: 100%;
			height: 300px;
			display: block;

		}
		.numbers{
	        color: white;
			margin: 0;
			padding: 0;
			width: 50px;
			height: 100%;
			display: inline-block;
			float: left;
		}
		.numbers li
		{
			list-style: none;
			height: 150px;
			position: relative;

		}
		.number span
		{
			font-size: 12px;
			font-weight: 600;
			position: absolute;
			bottom: 0;
			right: 10px;
		}
		.bars{
			color: #fff;
			font-size: 600;
			background:#555;
			margin: 0;
			padding: 0;
			display: inline-block;
			width: 500px;
			height: 320px;
			box-shadow: 0 0 10px 0 #555;
			border-radius: 5px;

		}
		.bars li
		{
			display: table-cell;
			width: 100px;
			height: 320px;
			position: relative;
		}
		.bars span{
			width: 100%;
			position: absolute;
			bottom: -50px;
			text-align: center;
		}
		.bars .bar
		{
			display: block;
			background:blue;
			width: 50px;
			height: 150px;
			position: absolute;
			bottom: 0;
			margin-left: 25px;
			text-align: center;
		/*	box-shadow: 0 0 10px 0 rgba(23,192,235,0.5);*/
			transition: 0.5s;
			transition-property: background;
		}

		.bars .bar:hover{
			background: #55EFC4;
			/*box-shadow: 0 0 10px 0 rgba(23,192,235,0.5);*/
			cursor: pointer;
		}
		.bars .bar::before{
			color: white;
			content:""attr(data-percentage)"%";
			position: relative;
		}
		#id
		{
			margin-top: 300px;
		}
		#val
		{
			float: right;
			margin-right: 200px;
			width: 200px;
			height: 100px;
			margin-top: 250px;
			background-color: grey;
			color: #fff;
			font-size: 24px;
			border: none;
			border-radius: 10px;
			cursor: pointer;
		
		}
		#val:hover
		{
			background: blue;
		}
		#headi
		{
			color: white;
			margin-left: 220px;
			color: blue;
		}

	</style>
</head>
<body style="background: #333;">
	<?php include 'header.php'; ?>
		<div>
		<a href="user.php"><input type="submit" name="val" id="val" value="Attempt Again"></a>
	</div>
	<div class="c1">

	<div class="chart">
		<h2 id="headi">Progress Chart</h2>	
		<ul class="numbers">
		 <li><span>100%</span></li>
		 <li><span>50%</span></li>
		 <li><span>0%</span></li>
		</ul>
		<ul class="bars">
		<?php


   include 'dbcon.php';
   $subid = $_GET['id'];
   $email=$_SESSION['email'];
    $x = new  answer_tbl();
	$z = $x->showperformance($subid,$email);

    	$val =count($z);
    	for($i=0;$i<$val;$i++)
    	{
    		

			echo '<li>';
				echo "<div class='bar' id='bar1' data-percentage= {$z[$i][0]}></div><span>Attempt".($i+1).'</span>';
			echo '</li>';
    	}
		?>
		</ul>
	</div>
	</div>



<script>
	$(function(){
   
		$('.bars li .bar').each(function(key,bar){
			var percentage = $(this).data('percentage');
			$(this).animate({
				'height' : percentage
			})
		})
	})
</script>
</body>
</html>