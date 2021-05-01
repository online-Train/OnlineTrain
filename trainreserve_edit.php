<?php 
//session_start();
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary">Edit My Reservation</h3>
</div>

<?php

$conn = mysqli_connect("localhost", "root", "91harship", "railwaybooking");

if (isset($_POST['edit_btn'])) {
	$id=$_POST['edit_id'];
	$query="SELECT * FROM reservet WHERE idReserveT='$id'";
	//echo $query;
	$query_run=mysqli_query($conn,$query);

//echo $query_run;
if (is_array($query_run) || is_object($query_run)){
	foreach ($query_run as $row) 
{
}
//print_r($row) ;
	?>


	

<div id="content-wrapper" class="d-flex flex-column">
	
<div id="reservation">
		<div class="container" id="homepage">

			<div>
	
		
		<form role="form" action="reserve_edit.php" method="POST">
			<input type="hidden" name="edit_id" value="<?php echo $row['idReserveT'];?>">
			 <div class="row"> 
			  <div class="col-sm-6">
			    <label for="from">From:</label>
			    <input type="text" class="form-control" value="<?php echo $row['FromL'];?>" id="FromL" name="edit_FromL" placeholder="From " required>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-6">
			    <label for="to">To:</label>
			    <input type="text" class="form-control" value="<?php echo $row['ToL'];?>" id="ToL" name="edit_ToL" placeholder="To" required>
			  </div>
			 </div>
			
			<div class="row">  
			  <div class="col-sm-6">
			    <label for="depart">Date:</label>
			    <input type="date" class="form-control" value="<?php echo $row['dateS'];?>" id="dateS" name="edit_dateS" required>
			  </div>  
			</div>
			<div class="row">
			  <div class="col-sm-6">
			    <label for="return">Time:</label>
			    <input type="text" class="form-control" id="train_time" value="<?php echo $row['train_time'];?>" name="edit_train_time" placeholder="HH:MM:SS" required>
			  </div>
			 </div>
			 
			 <div class="row">   
			 	 <div class="col-sm-6">
			    <label for="class">Class:</label>
			    <select class="form-control" name="edit_train_class" value="<?php echo $row['class'];?>" id="train_class">
			      <option value="First Class">First Class</option>
			      <option value="Second Class">Second Class</option>   
			      <option value="Third Class">Third Class</option> 
			    </select>
			  </div> 
			</div>
			<div class="row">
			  <div class="col-sm-6">
			    <label for="class">Train Type:</label>
			    <select class="form-control" name="edit_train_type" value="<?php echo $row['train_type'];?>" id="train_type">
			      <option value="Ordinary Train">Ordinary Train</option>
			      <option value="Express Train">Express Train</option>   
			      <option value="Intercity Train">Intercity Train</option> 
			    </select>
			  </div> 
			 </div>
			 <br>

			 <div>
			 	<a href="viewReservation.php" class="btn btn-danger">CANCEL</a>
			 	<button type="submit" name="updatebtn" class="btn btn-primary"> UPDATE</button>
			 </div>
			 
			 
		  	</form>
		  </div>


		  	
			</form>
			 <?php
		} 
}

?>
	

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>
</div></div>