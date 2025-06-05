<?php
$uname = $_POST['uname'];
$pw = $_POST['pw'];

include("../SamgyupBowl/db.php");

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $uname_db = $row["username"];
        $pw_db = $row["password"];

        if($uname == $uname_db){
            if($pw == $pw_db){
                header("location: ../db.php?data=correct");
            }
        }


    }
}



?>