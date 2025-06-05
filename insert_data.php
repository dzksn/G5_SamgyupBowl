<?php
include 'dbcon.php';
?>

<?php

if(isset($_POST['add_order'])){
   
    $name = $_POST['name'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    if($name == "" || empty($name)){
        header('location:index_pos.php?message=Fill in what is needed!');
    }


    else{

        $sql = "insert into `orders` (`Customer Name`, `Total Price`, `Order Date and Time`, `Payment Status`) values ('$name', '$price', '$date', '$status')";

        $result = $conn->query($sql);

        if ($conn->connect_error) {
    die("Query Failed: " . $conn->connect_error);
    }

    else{
        header('location:index_pos.php?insert_msg=Data has been recorded.');
    }

}
}








?>