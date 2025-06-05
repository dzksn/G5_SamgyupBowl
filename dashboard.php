<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboardstyle.css">
    <title>SamgyupBowl Dashboard</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Samgyup Bowl</h1>
        </div>
        <ul>
            <a href="Menu.php" style="text-decoration: none;"><li style="color: white;"> &nbsp;<span>Digital Menu</span> </li></a>

            <!-- 🔗 POS System - Clickable Link -->
             <a href="index_pos.php" style="text-decoration: none;"><li style="color: white;">  &nbsp; <span>Point of Sale (POS) System</li></a></span>

            
            <a href="Inventory.php" style="text-decoration: none;"><li style="color: white;"> &nbsp; <span>Inventory System</li></a></span>
            <a href="index.php" style="text-decoration: none;"><li style="color: white;"> &nbsp;<span>Logout</span> </li></a>
          
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <h2 style="text-align: center; margin-right: 500px; font-size: 50px;">Welcome, User!</h2>
                <div class="user">
                    
               
                    <div class="img-case">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                
                <div class="card" onclick="window.location.href='Menu.php';">
                    <div class="box">
                        <h3>Digital Menu</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>

                <!-- 🏷 POS Card - Clickable for POS System -->
                <div class="card" onclick="window.location.href='index_pos.php';">
                    <div class="box">
                        <h3>POS System</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>

                <div class="card" onclick="window.location.href='Inventory.php';">
                    <div class="box">
                        <h3>Inventory System</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>
            </div>
            <h1>Inventory Quickview</h1>
            <form method="get" action="actions/addProduct.php">
                <input type="text" placeholder="Product Name" name="productName">
                <input type="text" placeholder="Product Price" name="productPrice">
                <input type="text" placeholder="Product Quantity" name="productQty">
                <input id="addProduct" type="submit">
            </form>
            <table border="1">
                <tr>
                    <th>Supply Image</th>
                    <th>Supply ID</th>
                    <th>Supply Description</th>
                    <th>Unit Price</th>
                    <th>Quantity on Hand</th>
                    
                </tr>
                <?php
                    include("../SamgyupBowl 1.2/db.php");

                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                                echo "<td>" . $row['productImg'] ."</td>";
                                echo "<td>" . $row['pid'] . "</td>";
                                echo "<td>" . $row['productName'] . "</td>";
                                echo "<td>" . $row['productPrice'] . "</td>";
                                echo "<td>" . $row['productQty'] . "</td>";
                               
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
