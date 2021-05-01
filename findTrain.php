<?php 
include('includes/header.php');
include('includes/navbar.php');
?>

<script type="text/javascript">
	$(function()
{
	$("$selectdate").datepicker(

{
	dateFormat:'yy/mm/dd'

		});
		});

</script>

<h6>Find a train/<a href="http://localhost/train/index.php"><u>back</u></h6></a>
<div id="content-wrapper" class="d-flex flex-column">
<div id="findtrain">
		<div class="container" id="homepage">
		<h1><b>Search For a Train</b></h1>
		
		<hr>
		<form role="form" method="post">
		  <div class="row">
		  <div class="col-sm-6">
		    <label for="trainNo">Train No:</label>
		    <input type="text" class="form-control" id="trainNo" name="trainNo" placeholder="Train number" >
		  </div>
		  
		 </div>
		  
		  <div class="row">
			  <div class="col-sm-6">
			    <label for="type">Train Type:</label>
			    <select class="form-control" name="type" id="trainType">
			      <option value="Ordinary Train">Ordinary Train</option>
			      <option value="Express Train">Express Train</option>   
			      <option value="Intercity Train">Intercity Train</option> 
			    </select>
			    
			    
			  </div>
			
			  </div>
			 
		  <div class="row">
			  <div class="col-sm-6">
			    <label for="depart">Date:</label>
			    <input type="date" class="form-control" id="train_date" name="train_date" >
			  </div>
			
			  </div>
			  
		  <div class="row">
			  <div class="col-sm-6">
			    <label for="depart">Time:</label>
			    <input type="text" class="form-control" id="train_time" name="train_time" placeholder="Time" >
			
			  </div>
		  </div>   
	
		  
		  <br>
		  <div class="btn-group btn-group-justified">	
				<div class="btn-group">
					<button type="submit" name="Search" class="btn btn-success">Search</button>
				</div>
				<div class="btn-group">
					<button type="reset"  class="btn btn-info" value="Reset">Reset</button>
				</div>
		  </div>
		</form>
	</div>
</div>

<?php


$servername = "localhost";
$username = "root";
$password = "91harship";
$dbname = "railwaybooking";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if(isset($_POST["Search"])) {
	$query="";

	$trainNo=$_POST["trainNo"];
	$type=$_POST["type"];
	$train_date=$_POST["train_date"];
	$train_time=$_POST["train_time"];
	if(isset($trainNo)){
		$query=mysqli_query($conn, "SELECT * FROM train where trainNo ='$trainNo' ");
	}
	if(isset($type)){
		$query=mysqli_query($conn, "SELECT * FROM train where trainType ='$type' ");
	}
	if(isset($train_date)){
		$query=mysqli_query($conn, "SELECT * FROM train where train_date ='$train_date' ");
	}
	if(isset($train_time)){
		$query=mysqli_query($conn, "SELECT * FROM train where train_time ='$train_time' ");
	}
	$count=mysqli_num_rows($query);
	if ($count=="0") {
		echo "<h3>No Records found !</h3>";
	}
	else{
		?>

		<table border="1" text class="table table-striped">
			<thead class="bg-dark">
			<tr>
				<th>Train No </th>
				<th>Train Type</th>
				<th>Date</th>
				<th>Time</th>
				
			</tr>
		</thead>
				<?php
					while ($row=mysqli_fetch_array($query)) {
						echo "<tr><td>{$row["trainNo"]}</td><td>{$row["trainType"]}</td><td> {$row["train_date"]}</td><td> {$row["train_time"]}</td></tr>";
					}
				}
			}
				?>
		</table>
	


			  
			</form>

	</div>	



<?php 

include('includes/footer.php');
include('includes/scripts.php');
?>

