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
<h6>Train Booking History/<a href="http://localhost/train/index.php"><u>back</u></h6></a>
<div id="content-wrapper" class="d-flex flex-column">
<div id="bookhistory">
		<div class="container" id="homepage">
		<h1><b>Booked Train History</b></h1>
		
		<hr>
		<form role="form"  method="post">
			 <div class="row"> 
			  <div class="col-sm-6">
			  <label for="selectdate">Select a date:</label>
			  <input type="date" class="form-control" id="selectdate" name="selectdate" required>
			  </div>
			 </div>
			 <br>
			<div class="row">   
			  <div class="col-sm-6">
			  <button type="submit" id = "search" name="Search" class="btn btn-primary">Show ALL</button>
			  </div>
			</div> 
		<hr>
		
<?php


$servername = "localhost";
$username = "root";
$password = "91harship";
$dbname = "railwaybooking";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if(isset($_POST["Search"])) {

	$selecttxt=$_POST["selectdate"];
	$query=mysqli_query($conn, "select * from reservet where dateS='$selecttxt'");
	$count=mysqli_num_rows($query);
	if ($count=="0") {
		echo "<h3>No Records found !</h3>";
	}
	else{
		?>

		<table border="1" text class="table table-striped">
			<thead class="bg-dark">
			<tr>
				<th>From </th>
				<th>To</th>
				<th>Date</th>
				<th>Time</th>
				<th>Class</th>
				<th>Train Type</th>
			</tr>
		</thead>
				<?php
					while ($row=mysqli_fetch_array($query)) {
						echo "<tr><td>{$row["FromL"]}</td><td>{$row["ToL"]}</td><td> {$row["dateS"]}</td><td> {$row["train_time"]}</td><td>{$row["class"]}</td><td>{$row["train_type"]}</td></tr>";
					}
				}
			}
				?>
		</table>
	


			  
			</form>

	</div>	




<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>