<?php 
include('includes/header.php');
include('includes/navbar.php');
?>

   <!DOCTYPE html>
   <html>
   
   <body>
   
  
   
<style type="text/css">

<style>
.container {
  position: relative;
  width: 100%;
  max-width: 400px;
}

.container img {
  width: 100%;
  height: 75%;

}

.container .btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #ffffff;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 15px;
  text-align: center;
}

.container .btn:hover {
  background-color: black;
}

.img-block{
    height: 203px !important;
}
</style>

</style>

<body>

<div class="container">
    <div class="row" style="align-items: center;margin-bottom: 35px;">
     <div class="col-md-6 col-sm-6">
      <img class="img-block" src="includes/img/train1.jpg">
        <button class="btn"><a href="http://localhost/train/trainReservation.php">Reserve Your Train Ticket</button></a>
     </div>
     <div class="col-md-6 col-sm-6">
        <img class="img-block" src="includes/img/train4.jpg">
        <button class="btn"><a href="http://localhost/train/viewReservation.php">View My Reservations</button></a>
     </div>
    </div>
</div>

<div class="container">
    <div class="row"  style="align-items: center;margin-bottom: 35px;">
     <div class="col-md-6 col-sm-6">
      <img class="img-block" src="includes/img/train2.jpg">
      <button class="btn"><a href="http://localhost/train/findTrain.php">Find a Train Here</button></a>
     </div>
    <div class="col-md-6 col-sm-6">
      <img class="img-block" src="includes/img/train3.jpg">
      <button class="btn"><a href="http://localhost/train/bookingHistory.php">View booking History</button></a>
    </div>
  </div>
</div>


</body>

</html>


     


<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>

    





