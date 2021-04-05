<?php
    include_once 'connect_db.php';
    $success  = "";
    if(isset($_POST['add']))
    {	 
        $train_id  = $_POST['train_id'];
        $train_name = $_POST['train_name'];
        $description   = $_POST['description'];
        $engine_type = $_POST['engine_type'];
        $train_type = $_POST['train_type'];
        
        $sql = "INSERT INTO train (train_id,train_name,description,	engine_type,train_type)
        VALUES ('$train_id','$train_name','$description','$engine_type','$train_type')";
        if (mysqli_query($conn, $sql))
        {
            $success    =   "New record created successfully !";
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>