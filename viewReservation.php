<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>
<h6>View My Reservations/<a href="http://localhost/train/index.php"><u>back</u></h6></a>
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">My Reservations</h6>
                        </div>

<div class="card-body">
<div class="table-responsive">
	<?php 
	$conn = mysqli_connect("localhost", "root", "91harship", "railwaybooking");
	$sql = "select * from reservet";
	$rs = mysqli_query($conn, $sql);
	//get row
	$fetchRow = mysqli_fetch_assoc($rs);
?> 

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
?>
<table class="table table-bordered" id="viewreservation">

	<thead>
    <tr>
      <th>ID</th>
      <th>From</th>
      <th>To</th>
      <th>Reservation Date</th>
      <th>Reservation Time</th>
      <th>Class</th>
      <th>Train Type</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

  	<?php
if (mysqli_num_rows($rs)>0) {
	while ($row=mysqli_fetch_assoc($rs)) {
		?>

		 <tr>
      <th><?php echo $row['idReserveT'];?></th>
      <td><?php echo $row['FromL']; ?></td>
      <td><?php echo $row['ToL'];?></td>
      <td><?php echo $row['dateS'];?></td>
      <td><?php echo $row['train_time'];?></td>
      <td><?php echo $row['class'];?></td>
      <td><?php echo $row['train_type']; ?></td>
      <td>
      	<form action="trainreserve_edit.php" method="post">
      		<input type="hidden" name="edit_id" value="<?php echo $row['idReserveT'];?>">
      	<button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
      	</form>
      </td>
      <td>
      	<form action="reserve_edit.php" method="POST" >
      		<input type="hidden" name="delete_id" value="<?php echo $row['idReserveT'];?>">
      	<button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
      	</form>
      </td>

    </tr>
    <?php

	}
}else{
	echo "No Record Found";
}
  	?>
   
    
  </tbody>
</table>


<?php 

include('includes/footer.php');
include('includes/scripts.php');
?>

<script type="text/javascript">
$(document).ready( function () {
    $('#viewreservation').DataTable();
} );
</script>