<?php include 'dbcon.php'; ?>


<?php

    if(isset($_GET['OrderID'])){
        $OrderID = $_GET['OrderID'];
    }

$sql = "delete from `orders` where `OrderID` = '$OrderID'";

$result = $conn->query($sql);

if(!$result){
    die("Query Failed". $conn_error());
}
else{
    header('location:index_pos.php?delete_msg=You have deleted the order.');
}

?>