<?php 

include('includes/header.php');
include('includes/navbar.php');
?>

 
<?php 
$servername = "localhost";
$username = "root";
$password = "91harship";
$dbname = "railwaybooking";
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}
 
?>
 
<?php 
	$sql = "select * from user where id = 1";
	$rs = mysqli_query($conn, $sql);
	//get row
	$fetchRow = mysqli_fetch_assoc($rs);
?> 
<div id="content-wrapper" class="d-flex flex-column">
<div id="myprofile">
		<div class="container" id="homepage">

			
		<h1><b>Profile</b></h1>
		
		<hr>
		<form role="form" action="" method="post">
			 <div class="row"> 
			  <div class="col-sm-4">
			  <label for="fname">Full Name:</label>
			 </div>
			 <div class="col-sm-8">
			  <input type="text" name="fname" size="50" value="<?php echo $fetchRow['fname'] ." ". $fetchRow['lname']?>" required>
			 </div>
			 
			</div>
			<hr>
 		<div class="row"> 
			  <div class="col-sm-4">
			    <label for="from">Email Address:</label>
			    			  </div>
			  <div class="col-sm-8">
			    <input type="text" name="email" size="50" value="<?php echo $fetchRow['email']?>" required>
			    
			  </div>
			 </div>
			 <hr>
 		<div class="row"> 
			  <div class="col-sm-4">
			    <label for="from">N.I.C. or Passport Number:</label>
			    			  </div>
			  <div class="col-sm-8">
			    <input type="text" name="NIC" size="50" value="<?php echo $fetchRow['NIC']?>" required>
			    
			  </div>
			 </div>
			 <hr>
 		<div class="row"> 
			  <div class="col-sm-4">
			    <label for="from">Contact Number:</label>
			    			  </div>
			  <div class="col-sm-8">
			    <input type="text" name="phone" size="50" value="<?php echo $fetchRow['phone']?>" required>
			    
			  </div>
			 </div>
			 <hr>
			<div class="row">   
			  <!-- <div class="col-sm-6">
			  <button type="submit" name="profile_edit_btn" value="edit" class="btn btn-primary">Edit</button>
			  </div> -->
			  <div>
			 	<a href="profile.php" class="btn btn-danger">CANCEL</a>
			 	<button type="submit" name="updatebtn" class="btn btn-primary"> UPDATE</button>
			 </div>

			</div> 
			
			</form>

	</div>	
<br><br><br><br>
<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>