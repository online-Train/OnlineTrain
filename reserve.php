<?php

session_start();
include 'dbconnect.php';

//if(isset($_POST['add']))
//{
//	$idReserveT  = $_POST['idReserveT'];
	$FromL=$_POST['FromL'];
	$ToL=$_POST['ToL'];
	$dateS=$_POST['dateS'];
	$train_time=$_POST['train_time'];
	$train_class=$_POST['train_class'];
	$train_type=$_POST['train_type'];

	$query="INSERT INTO reservet(FromL,ToL,dateS,train_time,class,train_type) VALUES('$FromL','$ToL','$dateS','$train_time','$train_class','$train_type')";
	//echo $query;
	$query_run=mysqli_query($conn,$query);

	if ($query_run) {
		$_SESSION['success']="Reservation added and you will receive your booking confirmation soon...";
		//echo "Added";
		header('Location:viewReservation.php');
	}else
	{		
		$_SESSION['status']="Reservation not added";
		//echo mysqli_error($conn);
		header('Location:viewReservation.php');
	}







?>



