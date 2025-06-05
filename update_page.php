<?php
include 'dbcon.php';

// Show POS transactions

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pos_style.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>SamgyupBowl POS Dashboard</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Samgyup Bowl</h1>
        </div>
        <ul>
            <a href="dashboard.php" style="text-decoration: none;"><li style="color: white;">  &nbsp; <span>Dashboard</li></a></span>
             <li> &nbsp; <span>Inventory System</span> </li>
            <li> &nbsp;<a href="index_pos.php" class="active"><span>Point of Sale (POS) System</span></a> </li>
            <li> &nbsp;<span>Digital Menu</span> </li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="user">
                    <div class="img-case">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <h1>POS Transactions Overview</h1>




<?php include 'dbcon.php'; ?>


<?php

    if(isset($_GET['OrderID'])){
        $OrderID = $_GET['OrderID'];

                        $sql = "SELECT * FROM `orders` where `OrderID` = '$OrderID'";
                        $result = $conn->query($sql);

                            if ($row = $result->fetch_assoc()) {
                            }
                                else{
                                    $row = $result->fetch_assoc($result);
                                }
                                ?>
                                                                    

                                      <?php
                        }
                        
                    
                        ?>

<?php

    if(isset($_POST['update_order'])){

        if(isset($_GET['OrderID_new'])){
            $OrderIDnew = $_GET['OrderID_new'];
        }

        $name = $_POST['name'];
        $price = $_POST['price'];
        $date = $_POST['date'];
        $status = $_POST['status'];

        $sql = "update `orders` set `Customer Name` = '$name', `Total Price` = '$price', `Order Date and Time` = '$date', `Payment Status` = '$status' where `OrderID` = '$OrderIDnew'";

        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        }

                        else{
                            header('location:index_pos.php?update_msg=You have successfully updated the order.');
                        }

    }

?>


<form action="update_page.php?OrderID_new=<?php echo $OrderID; ?>" method="post">
<div class="form-group">
                <label for="name">Customer Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['Customer Name']?>">
            </div>
            <div class="form-group">
                <label for="price">Total Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $row['Total Price']?>">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="text" name="date" class="form-control" value="<?php echo $row['Order Date and Time']?>">
            </div>
            <div class="form-group">
                <label for="status">Payment Status</label>
                <input type="text" name="status" class="form-control" value="<?php echo $row['Payment Status']?>">
            </div>
            <input type="submit" class="btn btn-success" name="update_order" value="UPDATE">
</form>