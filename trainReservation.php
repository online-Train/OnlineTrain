<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>
<div>
	<?php
if (isset($_SESSION['success']) && $_SESSION['success']!='') {
	echo '<h6 class="bg-success text-white">'.$_SESSION['success'].'</h6>';
	unset($_SESSION['success']);
	# code...
}
if (isset($_SESSION['status']) && $_SESSION['status']!='') {
	echo '<h6 class="bg-danger text-white">'.$_SESSION['status'].'</h6>';
	unset($_SESSION['status']);
	# code...
}

	?></div>
<h6>Train Reservation/<a href="http://localhost/train/index.php"><u>back</u></h6></a>	
<div id="content-wrapper" class="d-flex flex-column">
	
<div id="reservation">
		<div class="container" id="homepage">
		<h1><b>Reserve Your Train Ticket Here</b></h1>
		
		<hr>
		<form role="form" action="reserve.php" method="POST">
			 <div class="row"> 
			  <div class="col-sm-6">
			    <label for="from">From:</label>
			    <input type="text" class="form-control" id="FromL" name="FromL" placeholder="From " required>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-6">
			    <label for="to">To:</label>
			    <input type="text" class="form-control" id="ToL" name="ToL" placeholder="To" required>
			  </div>
			 </div>
			
			<div class="row">  
			  <div class="col-sm-6">
			    <label for="depart">Date:</label>
			    <input type="date" class="form-control" id="dateS" name="dateS" required>
			  </div>  
			</div>
			<div class="row">
			  <div class="col-sm-6">
			    <label for="return">Time:</label>
			    <input type="text" class="form-control" id="train_time" name="train_time" placeholder="HH:MM:SS" required>
			  </div>
			 </div>
			 
			 <div class="row">   
			 	 <div class="col-sm-6">
			    <label for="class">Class:</label>
			    <select class="form-control" name="train_class" id="train_class">
			      <option value="First Class">First Class</option>
			      <option value="Second Class">Second Class</option>   
			      <option value="Third Class">Third Class</option> 
			    </select>
			  </div> 
			</div>
			<div class="row">
			  <div class="col-sm-6">
			    <label for="class">Train Type:</label>
			    <select class="form-control" name="train_type" id="train_type">
			      <option value="Ordinary Train">Ordinary Train</option>
			      <option value="Express Train">Express Train</option>   
			      <option value="Intercity Train">Intercity Train</option> 
			    </select>
			  </div> 
			 </div>
			 <br>
			 
			  <div class="btn-group btn-group-justified">	
				<div class="btn-group">
					<button type="submit" name ="add" value ="add" class="btn btn-success">Submit</button>
				</div>
				<div class="btn-group">
					<button type="reset"  class="btn btn-info" value="Reset">Reset</button>
				</div>
		  	  </div>
			</form>
	</div></div>

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>