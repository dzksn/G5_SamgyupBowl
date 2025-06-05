<?php 
include(__DIR__ . '/db.php');

$uploadDir = 'uploads/';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['productImg'])) {
    $productName = trim($_POST['productName'] ?? '');
    $productPrice = trim($_POST['productPrice'] ?? '');
    $productQty = trim($_POST['productQty'] ?? '');

    if (!$productName || !$productPrice || !$productQty) {
        $errors[] = "Please fill all required fields.";
    }

    if (!isset($_FILES['productImg']) || $_FILES['productImg']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Please upload a valid product image.";
    } else {
        $fileTmpPath = $_FILES['productImg']['tmp_name'];
        $fileName = basename($_FILES['productImg']['name']);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($fileExtension, $allowedExtensions)) {
            $errors[] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        } else {
            $newFileName = uniqid('prod_', true) . '.' . $fileExtension;
            $destPath = $uploadDir . $newFileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (!move_uploaded_file($fileTmpPath, $destPath)) {
                $errors[] = "Failed to move uploaded file.";
            }
        }
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO products (productName, productPrice, productQty, productImg) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdis", $productName, $productPrice, $productQty, $newFileName);

        if ($stmt->execute()) {
            header("Location: inventory.php");
            exit;
        } else {
            $errors[] = "Database insert failed: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="dashboardstyle.css">
  <title>SamgyupBowl Inventory</title>
</head>
<body>

<div class="side-menu">
  <div class="brand-name">
    <h1>Samgyup Bowl</h1>
  </div>
  <ul>
    <a href="dashboard.php" style="text-decoration: none; color: white;"><li><span>Dashboard</span></li></a>
     <a href="Menu.php" style="text-decoration: none;"><li style="color: white;"> &nbsp;<span>Digital Menu</span> </li></a>
    <a href="index_pos.php" style="text-decoration: none; color: white;"><li><span>Point of Sale (POS) System</span></li></a>
 
      <a href="inventory.php" style="text-decoration: none; color: white;"><li style="color: blue"><span>Inventory System</span></li></a>
    <a href="index.php" style="text-decoration: none;"><li style="color: white;"> &nbsp;<span>Logout</span> </li></a>
  </ul>
</div>

<div class="container">
  <div class="content">
    <h1>Inventory Listing</h1>

    <?php if (!empty($errors)) : ?>
      <div style="color: red; margin-bottom: 10px;">
        <?php foreach ($errors as $error) {
          echo htmlspecialchars($error) . "<br>";
        } ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">
      <input type="file" name="productImg" accept="image/*" required>
      <input type="text" placeholder="Product Name" name="productName" required>
      <input type="text" placeholder="Product Price" name="productPrice" required>
      <input type="text" placeholder="Product Quantity" name="productQty" required>
      <input type="submit" value="Add Product">
    </form>

    <table>
      <thead>
        <tr>
          <th>Product Image</th>
          <th>Product ID</th>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Product Quantity</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM products ORDER BY pid DESC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imgSrc = $row['productImg'] ? $uploadDir . $row['productImg'] : 'default.png';
                echo "<tr>";
                echo "<td><img src='" . htmlspecialchars($imgSrc) . "' width='50' height='50' alt='Product'></td>";
                echo "<td>" . htmlspecialchars($row['pid']) . "</td>";
                echo "<td>" . htmlspecialchars($row['productName']) . "</td>";
                echo "<td>₱" . htmlspecialchars($row['productPrice']) . "</td>";
                echo "<td>" . htmlspecialchars($row['productQty']) . "</td>";
                echo "<td>
                        <a href='#' onclick='openEditModal({$row['pid']}, {$row['productPrice']}, {$row['productQty']})' style='color: blue;'>Edit</a> |
                        <a href='actions/deleteProduct.php?pid=" . urlencode($row['pid']) . "' onclick='return confirm(\"Are you sure you want to delete this product?\")' style='color: red;'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No products found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Edit Product Modal -->
<div id="editModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">
  <div style="background:white; margin:10% auto; padding:20px; width:700px; border-radius:10px; position:relative;">
    <h2>Edit Product</h2>
    <form id="editForm">
      <input type="hidden" name="pid" id="editPid">
      <label>Price: <input type="text" name="productPrice" id="editPrice"></label><br><br>
      <label>Quantity: <input type="text" name="productQty" id="editQty"></label><br><br>
      <input type="submit" value="Update">
      <button type="button" onclick="closeModal()">Cancel</button>
    </form>
  </div>
</div>

<script>
function openEditModal(pid, price, qty) {
  document.getElementById('editPid').value = pid;
  document.getElementById('editPrice').value = price;
  document.getElementById('editQty').value = qty;
  document.getElementById('editModal').style.display = 'block';
}

function closeModal() {
  document.getElementById('editModal').style.display = 'none';
}

document.getElementById('editForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const pid = document.getElementById('editPid').value;
  const price = document.getElementById('editPrice').value;
  const qty = document.getElementById('editQty').value;

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "actions/updateProduct.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      closeModal();
      location.reload(); // Reloads table
    } else {
      alert("Update failed.");
    }
  };
  xhr.send(`pid=${pid}&productPrice=${price}&productQty=${qty}`);
});
</script>

</body>
</html>
