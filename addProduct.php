<?php

$productName = $_GET['productName']; 
$productPrice = $_GET['productPrice']; 
$productQty = $_GET['productQty'];

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "SamgyupBowl";
                
$conn = new mysqli($localhost, $username, $password, $dbname);

$sql = "INSERT INTO `products` (`pid`, `productName`, `productPrice`, `productQty`, `productImg`) VALUES (NULL, '$productName', '$productPrice', '$productQty', '');";

if($conn->query($sql) === TRUE){
    header("location: ../dashboard.php");
}

?>