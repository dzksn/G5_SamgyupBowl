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
           <a href="Menu.php" style="text-decoration: none;"><li style="color: white;"> &nbsp;<span>Digital Menu</span> </li></a>
          
            <li> &nbsp;<a href="index_pos.php" class="active"><span>Point of Sale (POS) System</span></a> </li>
              <a href="Inventory.php" style="text-decoration: none;"><li style="color: white;"> &nbsp; <span>Inventory System</li></a></span>
            
            <a href="index.php" style="text-decoration: none;"><li style="color: white;"> &nbsp;<span>Logout</span> </li></a>
         
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

            <div class="table-wrapper">
                <table class="pos-table">
                    
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New Order</button>
                    
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Total Price</th>
                            <th>Order Date and Time</th>
                            <th>Payment Status</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        $sql = "SELECT * FROM `orders`";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        }

                            while ($row = $result->fetch_assoc()) {
                                ?>
                                 <tr>
                                        <td><?php echo $row['OrderID'] ?></td>
                                        <td><?php echo $row['Customer Name'] ?></td>
                                        <td><?php echo $row['Total Price'] ?></td>
                                        <td><?php echo $row['Order Date and Time'] ?></td>
                                        <td><?php echo $row['Payment Status'] ?></td>
                                        <td><a href="update_page.php?OrderID=<?php echo $row['OrderID'] ?>" class="btn btn-success">Update</a></td>
                                        <td><a href="delete_page.php?OrderID=<?php echo $row['OrderID'] ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>


                                      <?php
                        }

                        ?>
                    </tbody>
                </table>

<?php

if(isset($_GET['message'])){
    echo "<h6>".$_GET['message']."</h6>";
}

?>

<?php

if(isset($_GET['insert_msg'])){
    echo "<h6>".$_GET['insert_msg']."</h6>";
}

?>

<?php

if(isset($_GET['update_msg'])){
    echo "<h6>".$_GET['update_msg']."</h6>";
}

?>


<?php

if(isset($_GET['delete_msg'])){
    echo "<h6>".$_GET['delete_msg']."</h6>";
}

?>

<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label for="name">Customer Name</label>
                <input type="text" name="name" class="form-control" placeholder="Customer Name">
            </div>
            <div class="form-group">
                <label for="price">Total Price</label>
                <input type="text" name="price" class="form-control" placeholder="00.00">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="text" name="date" class="form-control" placeholder="0000-00-00">
            </div>
            <div class="form-group">
                <label for="status">Payment Status</label>
                <input type="text" name="status" class="form-control" placeholder="Status">
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_order" value="ADD">
      </div>
    </div>
  </div>
</div>
 </form>              
            </div>

        </div>
    </div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</body>
</html>


