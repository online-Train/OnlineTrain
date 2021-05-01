<?php
include_once 'dbconnect.php';



$selectdate = $_POST["selectdate"];


global $sql, $availableNumber;

    $sql = "SELECT * 
            FROM flight FL,  class C, airplane AP 
            WHERE (FL.number = C.number) AND (FL.airplane_id = AP.ID) 
            
            ORDER BY FL.number";


$result = mysqli_query($con,$sql);
$rowcount = mysqli_num_rows($result);


if($rowcount == 0){
    echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." result</div>";
}
else{
echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." results</div>";

echo "<table class='table table-bordered table-striped table-hover'>
      <thead>
      <tr>
        <th>No</th>
        <th>Train Number</th>
        <th>Train Type</th>
        <th>Date</th>
        <th>Time</th>
       
      </tr>
      </thead>";
while($row = mysqli_fetch_array($result)) {
    echo "<tbody><tr>";
    echo "<td>" . $row['idserach_train'] . "</td>";
    echo "<td>" . $row['trainNo']. "</td>";
    echo "<td>" . $row['trainType'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";

    
   
        //calculate number of remain seats
        $seatreserved = "SELECT flightno, classtype, COUNT(*)
                    FROM book B
                    WHERE B.date = '".$selectdate."' AND B.flightno = '".$row['number']."'AND B.classtype ='".$row['name']."' AND paid=1
                    GROUP BY flightno, classtype";
        $reserved = mysqli_query($con, $seatreserved);   
        $reservedNumber = mysqli_fetch_array($reserved);
        
        $capacity = mysqli_query($con, "SELECT capacity FROM class C WHERE C.number='".$row['number']."' AND C.name= '".$row['name']."'");
        $capacityNumber = mysqli_fetch_array($capacity);


        if(mysqli_num_rows($reserved)>0){            
            $availableNumber = $capacityNumber['capacity'] - $reservedNumber['COUNT(*)'];
        }else{
            $availableNumber = $capacityNumber['capacity'];
        }
    
        echo "<td>".$availableNumber."</td>";
    
    if($availableNumber>0){
    echo '<td>
        <form action="shoppingcart.php" method="post">
        <input type="hidden" name="flightno" value="'.$row['number'].'">
        <input type="hidden" name="classtype" value="'.$row['name'].'">
        <input type="hidden" name="price" value="'.$row['price'].'">
        <input type="hidden" name="date" value="'.$selectdate.'">
        <input type="hidden" name="type" value="all">
        <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
        </td>';
    }else{
        echo "<td><button type='button' class='btn btn-warning' onclick='myFunction()'>Not Available</button></td>";
    }
    
    echo "</tr>";
}
echo " </tbody></table>";

}


//mysqli_free_result($result);

mysqli_close($con);
?>
 