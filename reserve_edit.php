<?php
session_start();

$conn = mysqli_connect("localhost", "root", "91harship", "railwaybooking");



if (isset($_POST['updatebtn'])) 
{

	$id=$_POST['edit_id'];
	$FromL=$_POST['edit_FromL'];
	$ToL=$_POST['edit_ToL'];
	$dateS=$_POST['edit_dateS'];
	$train_time=$_POST['edit_train_time'];
	$class=$_POST['edit_train_class'];
	$train_type=$_POST['edit_train_type'];
	
	$query = "UPDATE reservet SET FromL='$FromL', ToL='$ToL',  dateS='$dateS', train_time='$train_time', class='$class', train_type='$train_type' WHERE idReserveT='$id' ";

 $query_run=mysqli_query($conn,$query);

 if ($query_run) {
 	$_SESSION['success']="Your data is updated";
 	header('Location:viewReservation.php');
 }
 else
 {
$_SESSION['status']="Your data is not updated";
 	header('Location:viewReservation.php');
 }

}



if (isset($_POST['delete_btn'])) {
	$id=$_POST['delete_id'];

	$query="DELETE FROM reservet WHERE idReserveT='$id'";
	$query_run=mysqli_query($conn,$query);

	if ($query_run) {
		$_SESSION['success']="Your data is DELETED successfully";
		header('Location:viewReservation.php');
	}
	else
	{
		$_SESSION['status']="Your data is not DELETED";
 	header('Location:viewReservation.php');
	}
}

?>